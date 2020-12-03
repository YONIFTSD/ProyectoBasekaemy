<?php

namespace App\Http\Controllers;

use App\Models\PromotionPhoto;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionPhotoController extends Controller
{
    
    public function List($id_promotion)
    {   $promotion = Promotion::find($id_promotion);
        $promotion_photos = PromotionPhoto::where('id_promotion',$id_promotion)->where('state',1)->get();
        return view('pages.promotion.photos.list', [
            'promotion' => $promotion,
            'promotion_photos' => $promotion_photos
        ]);
    }


 
    public function Store(Request $request)
    {   

        $this->validate($request, [
            'image' => 'required'
        ]);

        try
        {
            
            $files = $request->file('image');
            foreach ($files as $file) {
                $path_file = "";
                $filenamenewextension = $file->getClientOriginalName();
                $filename = pathinfo($filenamenewextension,PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $filenamestore = $filename."_".time().".".$extension;
                $path_file = $file->storeAs(
                            'public/promotion/photos', $filenamestore
                        );
                $path_file = '/storage/promotion/photos/'.$filenamestore;

                $obj = new PromotionPhoto();
                $obj->id_promotion = $request->id_promotion;
                $obj->image = $path_file;
                $obj->state = 1;
                $obj->save();
                
            }
      
            return redirect()->route('promotion-photos', ['id' => $request->id_promotion]);
        } 
        catch (\Exception $e)
        {   
            return redirect()->back();
        } 
    }

    
    public function Destroy($id)
    {
       
    $obj = PromotionPhoto::find($id);
    PromotionPhoto::where('id_promotion_photo',$id)->delete();
    return redirect()->route('promotion-photos', ['id' => $obj->id_promotion]);
        
    }

    
}
