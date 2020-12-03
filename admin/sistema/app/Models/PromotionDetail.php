<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromotionDetail extends Model
{
    protected $table = 'promotion_detail';
    protected $primaryKey = 'id_promotion_detail';


    public static function add($detail)
    {
        if ($detail['view'] == "add") {
            if (session()->has('promotion-detail-i')) {

                $data = session('promotion-detail-i');
                $new = true;
                for ($i = 0; $i < count($data); $i++) {
                    if ($data[$i]['id_product'] == $detail['id_product']) {
                        $data[$i]['quantity'] += $detail['quantity'];
                        session(['promotion-detail-i' => $data]);
                        $new = false;
                    }
                }
                if ($new) {
                    array_push($data, $detail);
                    session(['promotion-detail-i' => $data]);
                    $data = session('promotion-detail-i');
                }
                return $data;
            } else {
                $data = array();
                array_push($data, $detail);
                session(['promotion-detail-i' => $data]);
                $data = session('promotion-detail-i');
                return $data;
            }
        }

        if ($detail['view'] == "edit") {
            
            $sesion_name = "promotion-detail-e".$detail['id_promotion'];
            if (session()->has($sesion_name)) {
                
                $data = session($sesion_name);
                $new = true;
                for ($i = 0; $i < count($data); $i++) {
                    if ($data[$i]['id_product'] == $detail['id_product']) {
                        $data[$i]['quantity'] += $detail['quantity'];
                        session([$sesion_name => $data]);
                        $new = false;
                    }
                }
                if ($new) {
                    array_push($data, $detail);
                    session([$sesion_name => $data]);
                    $data = session($sesion_name);
                }
                return $data;
            } else {
                $data = array();
                array_push($data, $detail);
                session([$sesion_name => $data]);
                $data = session($sesion_name);
                return $data;
            }
        }
    }

    public static function edit($detail)
    {
        if ($detail['view'] == "add") {
            if (session()->has('promotion-detail-i')) {

                $data = session('promotion-detail-i');
                for ($i = 0; $i < count($data); $i++) {
                    if ($data[$i]['id_product'] == $detail['id_product']) {
                        $data[$i]['quantity'] = $detail['quantity'];
                        session(['promotion-detail-i' => $data]);
                        return $data[$i];
                    }
                }
            
                return false;
            } 
        }

        if ($detail['view'] == "edit") {

            $sesion_name = "promotion-detail-e".$detail['id_promotion'];
            if (session()->has($sesion_name)) {

                $data = session($sesion_name);
                for ($i = 0; $i < count($data); $i++) {
                    if ($data[$i]['id_product'] == $detail['id_product']) {
                        $data[$i]['quantity'] = $detail['quantity'];
                        session([$sesion_name => $data]);
                        return $data[$i];
                    }
                }
                return $data;
            }
        }
    }

    public static function destroy($detail)
    {
        
        if ($detail['view'] == "add") {

            
            if (session()->has('promotion-detail-i')) {

                $data = session('promotion-detail-i');
                for ($i = 0; $i < count($data); $i++) {
                    if ($data[$i]['id_product'] == $detail['id_product']) {
                        $data[$i]['state'] = 0;
                        $data[$i]['quantity'] = 0;
                        session(['promotion-detail-i' => $data]);
                        return true;
                    }
                }
            
                return false;
            } 

        }

        if ($detail['view'] == "edit") {
            
            $sesion_name = "promotion-detail-e".$detail['id_promotion'];
            if (session()->has($sesion_name)) {

                $data = session($sesion_name);
                for ($i = 0; $i < count($data); $i++) {
                    if ($data[$i]['id_product'] == $detail['id_product']) {
                        $data[$i]['state'] = 0;
                        $data[$i]['quantity'] = 0;
                        session([$sesion_name => $data]);
                        return true;
                    }
                }
                return false;
            }
        }
    }

    
    public static function list($data)
    {
        
        if ($data['view'] == "add") {
            if (session()->has('promotion-detail-i')) {
                $data = session('promotion-detail-i');
                return $data;
            } else {
                return false;
            }
        }
        if ($data['view'] == "edit") {
            
            $sesion_name = "promotion-detail-e".$data['id_promotion'];

            if (session()->has($sesion_name)) {
                $data = session($sesion_name);
                return $data;
            } else {
                return 1;
            }
        }
        
    }
}
