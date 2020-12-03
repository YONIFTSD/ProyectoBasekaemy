<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    
    public function List()
    {
        $products = Product::ListAll('');

        return view('pages.products.list', [
            'products' => $products
        ]);
    }


    public function Search_List(Request $request)
    {   
        $q = !empty($request->q) || $request->q != "" ? $request->q :'';
        $products = Product::ListAll($q);
        return view('pages.products.list', [
            'products' => $products
        ]);
    }


    public function Add()
    {   
        $products = Product::where('state',1)->get();
        $categories = Category::where('state',1)->get();
        return view('pages.products.add',[
            'categories' => $categories,
            'products' => $products
        ]);
    }

 
    public function GetSubcategories($id)
    {   
        
        $subcategories = Subcategory::where('id_category',$id)->get();
        $result = '<option value="">[Seleccione una subcategoria]</option>';
        foreach ($subcategories as $be) {
            $result .= '
            <option value="'.$be->id_subcategory.'">'.$be->name.'</option>
            ';
        }
        return response()->json([
            'status' => 200,
            'result' => $result,
        ]);
    }

 
    public function Show($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $products = Product::where('state',1)->where('id_product','<>',$id)->get();
        $subcategories = Subcategory::where('id_category',$product->id_category)->get();
        return view('pages.products.view', [
            'product' => $product,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'products' => $products,
        ]);
    }

    
    public function Edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $products = Product::where('state',1)->where('id_product','<>',$id)->get();
        $subcategories = Subcategory::where('id_category',$product->id_category)->get();        
        return view('pages.products.edit', [
            'product' => $product,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'products' => $products,
            
        ]);
    }

    public function Store(Request $request)
    {   
     
        // dd($request);
        // $this->validate($request, [
        //     'id_category' => 'required',
        //     'id_subcategory' => 'required',
        //     'id_brand' => 'required',
        //     'code' => 'required',
        //     'name' => 'required',
        //     'image' => 'required',
        //     'state' => 'required'
        // ]);

   

        try
        {
            $path_file = "";
        
            if ($request->hasFile('image')){
                $filenamenewextension = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($filenamenewextension,PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $filenamestore = $filename."_".time().".".$extension;
                $path_file = $request->file('image')->storeAs(
                            'public/products', $filenamestore
                        );
                $path_file = '/storage/products/'.$filenamestore;
            }

      
            $obj = new Product();
            $obj->id_category = $request->id_category;
            $obj->id_subcategory = $request->id_subcategory;
            $obj->code = $request->code;
            $obj->name = $request->name;
            $obj->related_product = !empty($request->related_product) ? json_encode($request->related_product) : "[]";
            $obj->description = '';
            $obj->specification = '';
            $obj->image = $path_file;
            $obj->link_visa = $request->link_visa;
            $obj->regular_price = $request->regular_price;
            $obj->online_price = $request->online_price;
            $obj->discount = $request->discount;
            $obj->stock = 0;
            $obj->outstanding = $request->outstanding;
            $obj->state = $request->state;
            $obj->save();
            return redirect()->action('ProductController@List');
        } 
        catch (\Exception $e)
        {   
            return redirect()->back();
        } 
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
            $path_file = "";
        
            if ($request->hasFile('image')){
                $filenamenewextension = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($filenamenewextension,PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $filenamestore = $filename."_".time().".".$extension;
                $path_file = $request->file('image')->storeAs(
                            'public/products', $filenamestore
                        );
                $path_file = '/storage/products/'.$filenamestore;
            }

            $obj = Product::find($request->id_product);
            $obj->id_category = $request->id_category;
            $obj->id_subcategory = $request->id_subcategory;
            $obj->code = $request->code;
            $obj->name = $request->name;
            $obj->related_product = !empty($request->related_product) ? json_encode($request->related_product) : "[]";
            // $obj->description = $request->description;
            // $obj->specification = $request->specification;
            if (!empty($path_file)) {
                $obj->image = $path_file;
            }
            $obj->link_visa = $request->link_visa;
            $obj->regular_price = $request->regular_price;
            $obj->online_price = $request->online_price;
            $obj->discount = $request->discount;
            $obj->stock = 0;
            $obj->outstanding = $request->outstanding;
            $obj->state = $request->state;
            $obj->update();
            return redirect()->action('ProductController@List');
        } 
        catch (\Exception $e)
        {
            return redirect()->back();
        } 
    }

    public function Outstanding($id)
    {
        
        $obj = Product::find($id);
        $outstanding = $obj->outstanding == 1 ? 0:1;
        $obj->outstanding = $outstanding;

        $obj->update();
        return response()->json([
            'status' => 200,
            'outstanding' => $outstanding
,
        ]);
        
    }

    
    public function Destroy($id)
    {
       
    $obj = Product::find($id);
    $obj->state = 9;
    $obj->update();
    return redirect()->action('ProductController@List');
        
    }



    
    public function SearchProductPromotions(Request $request)
    {   
        
        $products = Product::SearchProductPromotions($request->q);
        return view('pages.promotion.components.search_product', [
            'products' => $products,
            'view' => $request->view,
        ]);
    }
    
}
