<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Coupon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function List()
    {
         $orders = Order::List();
        return view('pages.orders.list', [
            'orders' => $orders
        ]);
    }

    public function Show($id)
    {
        $order = Order::GetById($id);
        $coupon = Coupon::find($order->id_coupon);
        $order_detail = OrderDetail::List($id);

        // echo json_encode($order);
        // echo "<br>";
        // echo json_encode($coupon);
        // echo "<br>";
        // echo json_encode($order_detail);
        // echo "<br>";
        // return 1;
        return view('pages.orders.view', [
            'order' => $order,
            'coupon' => $coupon,
            'order_detail' => $order_detail,
        ]);
    }

    public function Edit($id)
    {
        $order = Order::GetById($id);
        return view('pages.orders.edit', [
            'order' => $order
        ]);
    }

    public function Update(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'image' => 'required',
        //     'state' => 'required',
        //     // 'id_category' => 'id_category'
        // ]);

        try
        {
            $obj = Order::find($request->id_order);
            $obj->document_type = $request->document_type;
            $obj->document_number = $request->document_number;
            $obj->name = $request->name;
            // $obj->last_name = $request->last_name;
            $obj->phone = $request->phone;
            $obj->ubigee = $request->ubigee;
            $obj->address = $request->address;
            // $obj->email = $request->email;
            // $obj->password = $request->password;
            $obj->birth_date = $request->birth_date;
            $obj->sex = $request->sex;
            $obj->state = $request->state;
            $obj->update();
            return redirect()->action('OrderController@List');
        } 
        catch (\Exception $e)
        {
            return redirect()->back();
        } 
    }


    public function Confirm($id)
    {
       
    $obj = Order::find($id);
    $obj->state = 2;
    $obj->payment_status = 1;
    $obj->update();
    return redirect()->action('OrderController@List');
        
    }

    public function Cancel($id)
    {
       
    $obj = Order::find($id);
    $obj->state = 0;
    $obj->update();
    return redirect()->action('OrderController@List');
        
    }
}
