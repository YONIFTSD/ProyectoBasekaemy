<?php

namespace App\Models;
use Illuminate\Support\Facades\Session ;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    public static function add($detail)
    {
        if (session()->has('carrito')) {

            $data = session('carrito');
            $new = true;
            for ($i=0; $i <count($data) ; $i++) { 

                if ($data[$i]['id_product'] == $detail['id_product'] && $data[$i]['size'] == $detail['size']) {
                    $data[$i]['quantity'] += $detail['quantity'];
                    $data[$i]['size'] = $detail['size'];
                    $data[$i]['total_price'] = number_format($data[$i]['quantity'] * $detail['unit_price'],2,'.','');
                    $data[$i]['state'] = 1;
                    session(['carrito' => $data]);
                    $new = false;
                }
            }

            if ($new) {
                $detail['total_price'] = number_format($detail['unit_price'] *$detail['quantity'],2,'.','');
                array_push($data,$detail);
                session(['carrito' => $data]);
                $data = session('carrito');
            }

            return $data;
        }else{
            $detail['total_price'] = number_format($detail['unit_price'] *$detail['quantity'],2,'.','');
            $data = array();
            array_push($data,$detail);
            session(['carrito' => $data]);
            $data = session('carrito');
            return $data;
        }
    }

    public static function edit($detail)
    {
        if (session()->has('carrito')) {

            $data = session('carrito');
            for ($i=0; $i <count($data) ; $i++) { 

                if ($data[$i]['id_product'] == $detail['id_product'] && $data[$i]['size'] == $detail['size']) {
                    $data[$i]['quantity'] = $detail['quantity'];
                    $data[$i]['size'] = $detail['size'];
                    $data[$i]['total_price'] = number_format($data[$i]['quantity'] * $data[$i]['unit_price'],2,'.','');
                    $data[$i]['state'] = 1;
                    session(['carrito' => $data]);
                    return $data[$i];
                }
               
            }
            return $data;
            
        }
    }

    public static function remove($detail)
    {
        if (session()->has('carrito')) {

            $data = session('carrito');
            for ($i=0; $i <count($data) ; $i++) { 

                if ($data[$i]['id_product'] == $detail['id_product'] && $data[$i]['size'] == $detail['size']) {
                    $data[$i]['quantity'] = 0;
                    $data[$i]['total_price'] = number_format(0,2,'.','');
                    $data[$i]['state'] = 0;
                    session(['carrito' => $data]);
                }
               
            }


            return $data;
        }
    }

    public static function list()
    {
        if (session()->has('carrito')) {
            $data = session('carrito');
            return $data;
        }else{
            return false;
        }
    }

    public static function finish()
    {
       session()->forget('carrito');
       return 1;
    }

    public static function validate_stock()
    {   
        $response['status'] = 200;
        $response['message'] = "";
        
        
        if (session()->has('carrito')) {
            $data = session('carrito');
            for ($i=0; $i <count($data) ; $i++) { 
                if ($data[$i]['state'] == 1) {
                    $product = Product::find($data[$i]['id_product']);
                    if ($product->stock < $data[$i]['quantity']) {
                        $response['status'] = 404;
                        $response['message'] = "El producto ".$product->name." no cuenta con suficiente stock";
                        return $response;
                    }
                }
               
            }
            return $response;
        }else{
            $response['status'] = 404;
            return $response;
        }
    }

    public static function sumary()
    {   
        $sumary['subtotal'] = 0;
        $sumary['discount'] = 0;
        $sumary['total'] = 0;
        $quantity_products = 0;
        $quantity_detail = 0;
        $prices = array();
        if (session()->has('carrito')) {
            $data = session('carrito');
            for ($i=0; $i <count($data) ; $i++) { 
                if ($data[$i]['state'] == 1) {
                    $sumary['total'] += $data[$i]['total_price'];    
                    $quantity_products++;
                    $quantity_detail += $data[$i]['quantity'];
                    array_push($prices,$data[$i]['total_price']);
                }
            }
            $sumary['subtotal'] = $sumary['total'];
        }
        
        
        $promotion = Promotion::where('state',1)->first();
        if($promotion && $promotion->id_promotion > 0){
            if ($promotion->product_quantity == $quantity_products && $quantity_detail == $promotion->product_quantity) {
                // ordernamos ascendentemente los precios
                sort($prices);
                for($i = 0; $i < count($prices); $i++) {
                    if ($promotion->amount_payment > $i) {
                        $sumary['discount'] += $prices[$i];  
                    }
                }
              
                
                $sumary['total'] = $sumary['subtotal'] - $sumary['discount'];
            }
        }
        

        $sumary['subtotal'] = number_format($sumary['subtotal'],2,'.','') ;
        $sumary['discount'] = number_format($sumary['discount'],2,'.','') ;
        $sumary['total'] = number_format($sumary['total'],2,'.','') ;
        return $sumary;
    }
}
