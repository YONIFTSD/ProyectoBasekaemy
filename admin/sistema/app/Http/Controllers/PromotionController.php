<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Models\PromotionDetail;
use Illuminate\Http\Request;

class PromotionController extends Controller
{

    public function List()
    {
        $promotions = Promotion::where('state', '<>', 9)->get();

        return view('pages.promotion.list', [
            'promotions' => $promotions
        ]);
    }

    public function Add()
    {
        return view('pages.promotion.add', []);
    }

    public function Show($id)
    {
        $promotion = Promotion::find($id);
        return view('pages.promotion.view', [
            'promotion' => $promotion,
        ]);
    }


    public function Edit($id)
    {

        $promotion = Promotion::find($id);
        return view('pages.promotion.edit', [
            'promotion' => $promotion,
        ]);
    }

    public function Store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            'product_quantity' => 'required',
            'amount_payment' => 'required',
        ]);

        try {
            $path_file = "";

            if ($request->hasFile('image')) {
                $filenamenewextension = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($filenamenewextension, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $filenamestore = $filename . "_" . time() . "." . $extension;
                $path_file = $request->file('image')->storeAs(
                    'public/promotion',
                    $filenamestore
                );
                $path_file = '/storage/promotion/' . $filenamestore;
            }

            $obj = new Promotion();
            $obj->name = $request->name;
            $obj->image = $path_file;
            $obj->product_quantity = $request->product_quantity;
            $obj->amount_payment = $request->amount_payment;
            $obj->state = $request->state;
            $obj->save();

            return redirect()->action('PromotionController@List');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function Update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'product_quantity' => 'required',
            'amount_payment' => 'required',
        ]);


        try {
            $path_file = "";

            if ($request->hasFile('image')) {
                $filenamenewextension = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($filenamenewextension, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $filenamestore = $filename . "_" . time() . "." . $extension;
                $path_file = $request->file('image')->storeAs(
                    'public/promotion',
                    $filenamestore
                );
                $path_file = '/storage/promotion/' . $filenamestore;
            }

            $obj = Promotion::find($request->id_promotion);
            $obj->name = $request->name;
            if (!empty($path_file)) {
                $obj->image = $path_file;
            }
            $obj->product_quantity = $request->product_quantity;
            $obj->amount_payment = $request->amount_payment;
            $obj->state = $request->state;
            $obj->update();

            return redirect()->action('PromotionController@List');
        } catch (\Exception $e) {
            return $e;
            return redirect()->back();
        }
    }



    public function Destroy($id)
    {

        $obj = Promotion::find($id);
        $obj->state = 9;
        $obj->update();
        return redirect()->action('PromotionController@List');
    }

}
