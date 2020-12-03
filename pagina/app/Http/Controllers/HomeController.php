<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\OrderDetail;
use App\Models\Category;
use App\Models\Coverpage;
use App\Models\Promotion;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function Dashbaord()
    {
        $coverpages = Coverpage::where('state', 1)->get();
        $categories = Category::where('state', 1)->get();
        
        return view('auth.dashboard',[
            'coverpages' => $coverpages,
            'categories' => $categories,
        ]);
        
    }

    public function Orders()
    {
        $coverpages = Coverpage::where('state', 1)->get();
        $categories = Category::where('state', 1)->get();
        
        
        $customer_id = Auth::user()->id_client;
        $orders = Order::where('id_client', $customer_id)->orderByDesc('id_order')->get();
        return view('auth.pages.orders', [
            'orders' => $orders,
            'coverpages' => $coverpages,
            'categories' => $categories,
        ]);
    }

    public function OrderView($id_order)
    {
        $coverpages = Coverpage::where('state', 1)->get();
        $categories = Category::where('state', 1)->get();
        

        $customer_id = Auth::user()->id_client;
        $order = Order::find($id_order);
        $coupon = Coupon::find($order->id_coupon);
        $order_detail = OrderDetail::List($id_order);
        if($customer_id != $order->id_client) return redirect()->action('HomeController@Orders');
        return view('auth.pages.order-view', [
            'order' => $order,
            'coupon' => $coupon,
            'order_detail' => $order_detail,
            'coverpages' => $coverpages,
            'categories' => $categories,
        ]);
    }

    public function Account()
    {
        $coverpages = Coverpage::where('state', 1)->get();
        $categories = Category::where('state', 1)->get();
        
        return view('auth.pages.account',[
            'coverpages' => $coverpages,
            'categories' => $categories,
        ]);
    }

    public function ChangePassword()
    {
        $coverpages = Coverpage::where('state', 1)->get();
        $categories = Category::where('state', 1)->get();
        
        return view('auth.pages.change-password',[
            'coverpages' => $coverpages,
            'categories' => $categories,
        ]);
    }

    public function UpdatePassword(Request $request)
    {
        $this->validate($request, [
            'password_old' => 'required|string|min:6',
            'password_new' => 'required|string|min:6'
        ]);

        try {
            if(Hash::check($request->password_old, Auth::user()->password))
            {
                $customer_id = Auth::user()->id_client;
                $obj = Customer::find($customer_id);
                $obj->password = bcrypt($request->password_new);
                $obj->update();
                return redirect()->action('HomeController@ChangePassword')->with('status', 'Has cambiado tu contraseña correctamente');
            }
            return redirect()->action('HomeController@ChangePassword')->with('warning', 'Contraseña actual incorrecta');
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'Se produjo un error. Inténtalo de nuevo más tarde.');
        }    
    }

    public function UpdateCustomer(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        try {
            if(Auth::check())
            {
                $customer_id = Auth::user()->id_client;
                $obj = Customer::find($customer_id);
                $obj->document_type = $request->document_type;
                $obj->document_number = $request->document_number;
                $obj->name = $request->name;
                $obj->last_name = $request->lastname;
                $obj->phone = $request->phone;
                $obj->update();
                return redirect()->action('HomeController@Account')->with('status', 'La cuenta se actualizó correctamente');
            }
            return redirect()->action('HomeController@Account')->with('warning', 'Sin autorización');
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'Se produjo un error. Inténtalo de nuevo más tarde.');
        }    
    }
}
