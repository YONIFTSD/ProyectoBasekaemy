<?php

namespace App\Http\Controllers;

use App\Models\ProductPhoto;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductPhotoController extends Controller
{
    
    public function List($id_product)
    {   $product = Product::find($id_product);
        $products_photo = ProductPhoto::where('id_product',$id_product)->where('state',1)->get();
        return view('pages.products.photos.list', [
            'product' => $product,
            'products_photo' => $products_photo
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
                            'public/products/photos', $filenamestore
                        );
                $path_file = '/storage/products/photos/'.$filenamestore;

                $obj = new ProductPhoto();
                $obj->id_product = $request->id_product;
                $obj->image = $path_file;
                $obj->state = 1;
                $obj->save();
                
            }
      
            return redirect()->route('product-photos', ['id' => $request->id_product]);
        } 
        catch (\Exception $e)
        {   
            return redirect()->back();
        } 
    }

    
    public function Destroy($id)
    {
       
    $obj = ProductPhoto::find($id);
    ProductPhoto::where('id_product_photo',$id)->delete();
    return redirect()->route('product-photos', ['id' => $obj->id_product]);
        
    }

    
}
