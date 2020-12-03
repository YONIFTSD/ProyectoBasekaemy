<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Customer;
use App\Models\Coverpage;
use App\Models\Category;
use App\Models\Carrito;
use App\Models\Promotion;
use App\Models\Coupon;
use Culqi\Culqi;

class CartController extends Controller
{
    public function MiCarrito()
    {


        $coverpages = Coverpage::where('state', 1)->get();
        $categories = Category::where('state', 1)->get();
        $carrito = Carrito::list();
        $sumary = Carrito::sumary();

        return view('pages.cart.mi-carrito', [
            'coverpages' => $coverpages,
            'categories' => $categories,
            'carrito' => $carrito,
            'sumary' => $sumary,
        ]);
    }

    public function addToCart(Request $request)
    {
        // session()->forget('carrito');

        $request->validate([
            'code' => 'required',
            'qty' => 'required',
            'size' => 'required',
        ]);

        $product = Product::find($request->code);

        $data['id_product'] = $product->id_product;
        $data['code'] = $product->code;
        $data['name'] = $product->name;
        $data['image'] = $product->image;
        $data['quantity'] = $request->qty;
        $data['size'] = $request->size;
        $data['unit_price'] = $product->online_price;
        $data['state'] = 1;
        $cart = Carrito::add($data);



        return response()->json(['status' => 'success', 'message' => 'Se agregó correctamente']);
    }

    public function updateToCart(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'qty' => 'required',
        ]);


        $product = Product::find($request->code);
        $data['id_product'] = $product->id_product;
        $data['quantity'] = $request->qty;
        $data['size'] = $request->size;
        $detail = Carrito::edit($data);


        return response()->json([
            'status' => 'success',
            'message' => 'Se actualizo correctamente',
            'data' => $detail,
        ]);
    }

    public function CartNumber()
    {
        $carrito = Carrito::list();
        $total = 0;
        for ($i=0; $i < count($carrito); $i++) { 
            if ($carrito[$i]['state'] == 1) {
                $total += $carrito[$i]['quantity'];
            }
        }
        return response()->json([
            'status' => 200,
            'total' => $total,
        ]);
    }

    public function listToCart()
    {
        $carrito = Carrito::list();
        return view('pages.cart.components/detail-cart', [
            'carrito' => $carrito,
        ]);
    }

    public function sumamryCart()
    {
        $carrito = Carrito::sumary();
        return response()->json([
            'status' => 200,
            'result' => $carrito
        ]);
    }



    public function removeFromCart(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'size' => 'required',
        ]);


        $data['id_product'] = $request->code;
        $data['size'] = $request->size;
        $cart = Carrito::remove($data);
        return response()->json(['status' => 'success', 'message' => 'Se eliminó correctamente']);
    }



    public function Checkout(Request $request)
    {

        $coverpages = Coverpage::where('state', 1)->get();
        $categories = Category::where('state', 1)->get();
        $promotion = Promotion::where('state', 1)->first();
        $carrito = Carrito::list();
        $sumary = Carrito::sumary();

        return view('pages.cart.checkout', [
            'coverpages' => $coverpages,
            'categories' => $categories,
            'carrito' => $carrito,
            'sumary' => $sumary,
        ]);
    }

    public function ValidateCoupon(Request $request)
    {
        $request->validate([
            'coupon' => 'required',
        ]);

        $coupon = Coupon::where('code', $request->coupon)->where('state', 1)->first();
        if ($coupon && $coupon->id_coupon > 0) {

            $sumary = Carrito::sumary();
            $discount = (($sumary['subtotal'] * $coupon->discount) / 100);
            $sumary['discount'] += $discount;
            $sumary['total'] = $sumary['subtotal'] - $sumary['discount'];

            $sumary['subtotal'] = number_format($sumary['subtotal'], 2, '.', '');
            $sumary['discount'] = number_format($sumary['discount'], 2, '.', '');
            $sumary['total'] = number_format($sumary['total'], 2, '.', '');

            return response()->json([
                'status' => 200,
                'coupon' => $coupon,
                'sumary' => $sumary,
            ]);
        } else {
            return response()->json([
                'status' => 404
            ]);
        }
    }

    public function ValidateOrder(Request $request)
    {
        $carrito = Carrito::list();
        $sumary = Carrito::sumary();
        // $validate = Carrito::validate_stock();

        if (count($carrito) == 0) {
            return response()->json([
                'status' => 404,
                'message' => 'Agregue productos a su carrito',
            ]);
        }
        // if ($validate['status'] == 404) {
        //     return response()->json([
        //         'status' => 404,
        //         'message' => $validate['message'],
        //     ]);
        // }

        return response()->json([
            'status' => 200,
            'sumary' => $sumary,
        ]);
    }


    public function SendOrder(Request $request)
    {
        $carrito = Carrito::list();
        $sumary = Carrito::sumary();
        $coupon = Coupon::where('code', $request->id_coupon)->where('state', 1)->first();

        if ($coupon && $coupon->id_coupon > 0) {

            $discount = (($sumary['subtotal'] * $coupon->discount) / 100);
            $sumary['discount'] += $discount;
            $sumary['total'] = $sumary['subtotal'] - $sumary['discount'];
            $sumary['subtotal'] = number_format($sumary['subtotal'], 2, '.', '');
            $sumary['discount'] = number_format($sumary['discount'], 2, '.', '');
            $sumary['total'] = number_format($sumary['total'], 2, '.', '');
            
        }

        $SECRET_KEY = 'sk_test_4maIY9bpVCqgICZC';
        $culqi = new Culqi(array('api_key' => $SECRET_KEY));

        try {
            if (Auth::check()) {

                $customer_id = Auth::user()->id_client;
                $obj = Customer::find($customer_id);

                //order
                $order = new Order();
                $order->id_client = $customer_id;
                $order->number_of_order = 0;
                $order->description = "";
                $order->payment_type = $request->payment_type;
                $order->id_coupon = !empty($request->id_coupon) ? $request->id_coupon : 0;
                $order->file = '';
                $order->subtotal = $sumary['subtotal'];
                $order->discount = $sumary['discount'];
                $order->total = $sumary['total'];
                $order->state = 1;
                if ($order->save()) {

                    for ($i = 0; $i < count($carrito); $i++) {
                        if ($carrito[$i]['state'] == 1) {
                            $orderDetail = new OrderDetail();
                            $orderDetail->id_order = $order->id_order;
                            $orderDetail->id_product = $carrito[$i]['id_product'];
                            $orderDetail->quantity = $carrito[$i]['quantity'];
                            $orderDetail->size = $carrito[$i]['size'];
                            $orderDetail->unit_price = $carrito[$i]['unit_price'];
                            $orderDetail->total_price = $carrito[$i]['total_price'];
                            $orderDetail->state = 1;
                            $orderDetail->save();
                    
                        }
                    }


                    // Creando Cargo a una tarjeta QUILQI
                    if ($request->payment_type == 4) {
                        try {
                            $charge = $culqi->Charges->create(
                                array(
                                    "amount" => number_format($sumary['total'], 2, '',''),
                                    "capture" => true,
                                    "currency_code" => "PEN",
                                    "description" => "Pedido ".$order->id_order,
                                    "email" => $obj->email,
                                    "installments" => 0,
                                    "antifraud_details" => array(
                                        "address" => $obj->address,
                                        "address_city" => "TACNA",
                                        "country_code" => "PE",
                                        "first_name" => $obj->name,
                                        "last_name" => $obj->last_name,
                                        "phone_number" => $obj->phone,
                                    ),
                                    "source_id" => $request->culqi_token
                                )
                            );
                        
                            if($charge->object == 'charge'){
                                $order->payment_status = 1;
                                $order->c_charge_id = $charge->id;
                                $order->c_commission = ($charge->total_fee / 100);
                                $order->c_igv = ($charge->total_fee_taxes / 100);
                                $order->c_amount_to_deposit = ($charge->transfer_amount / 100);
                                $order->update();
                            }
                        } catch (\Exception $e) {
                            $order->description = 'Ocurrio un error con el pago';
                            $order->update();
                        }
                    }
                    
                }

                Carrito::finish();
                $order_id = $order->id_order;
                
                return response()->json([
                    'status' => 200,
                    'order_id' => $order_id
                ]);
            }
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => 404,
                'response' => $e
            ]);
        }
    }

    public function OrderComplete($id_order)
    {
        $coverpages = Coverpage::where('state', 1)->get();
        $categories = Category::where('state', 1)->get();
        $order = Order::find($id_order);
        return view('pages.cart.complete', [
            'coverpages' => $coverpages,
            'categories' => $categories,
            'order' => $order,
        ]);
    }
}
