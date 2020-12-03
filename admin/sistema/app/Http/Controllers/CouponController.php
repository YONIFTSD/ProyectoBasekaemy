<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function List()
    {
        $coupons = Coupon::where('state','<>',9)->get();
        return view('pages.coupon.list', [
            'coupons' => $coupons
        ]);
    }


    public function Add()
    {
        return view('pages.coupon.add');
    }

 
   

 
    public function Show($id)
    {
        $coupon = Coupon::find($id);
        return view('pages.coupon.view', [
            'coupon' => $coupon
        ]);
    }

  
    public function Edit($id)
    {
        $coupon = Coupon::find($id);
        return view('pages.coupon.edit', [
            'coupon' => $coupon
        ]);
    }

    public function Store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
            'name' => 'required',
            'discount' => 'required',
            'state' => 'required'
        ]);

        try
        {   

            $obj = new Coupon();
            $obj->code = $request->code;
            $obj->name = $request->name;
            $obj->description = $request->description;
            $obj->discount = $request->discount;;
            $obj->state = $request->state;
            $obj->save();
            return redirect()->action('CouponController@List');
        } 
        catch (\Exception $e)
        {
            return redirect()->back();
        } 
    }

    public function Update(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
            'name' => 'required',
            'discount' => 'required',
            'state' => 'required',
        ]);

        try
        {   

            $obj = Coupon::find($request->id_coupon);
            $obj->code = $request->code;
            $obj->name = $request->name;
            $obj->description = $request->description;
            $obj->discount = $request->discount;;
            $obj->state = $request->state;
            $obj->update();
            return redirect()->action('CouponController@List');
        } 
        catch (\Exception $e)
        {
            return redirect()->back();
        } 
    }


    public function Destroy($id)
    {
       
        $obj = Coupon::find($id);
        $obj->state = 9;
        $obj->update();
        return redirect()->action('CouponController@List');
        
    }

}
