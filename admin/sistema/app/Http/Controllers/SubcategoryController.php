<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function List()
    {
        $subcategories = Subcategory::ListAll();
        return view('pages.subcategories.list', [
            'subcategories' => $subcategories
        ]);
    }


    public function Add()
    {   
        $categories = Category::where('state','=', 1)->get();
        return view('pages.subcategories.add', [
            'categories' => $categories
        ]);
    }

 
   

 
    public function Show($id)
    {
        $subcategory = Subcategory::find($id);
        $categories = Category::all();
        
        return view('pages.subcategories.view', [
            'categories' => $categories,
            'subcategory' => $subcategory,
        ]);
    }

  
    public function Edit($id)
    {
        $subcategory = Subcategory::find($id);
        $categories = Category::all();
        
        return view('pages.subcategories.edit', [
            'categories' => $categories,
            'subcategory' => $subcategory,
        ]);
    }

    public function Store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'id_category' => 'required',
            'state' => 'required'
        ]);

        try
        {

            $obj = new Subcategory();
            $obj->id_category = $request->id_category;
            $obj->name = $request->name;
            $obj->description = $request->description;
            $obj->order_item = 0;
            $obj->state = $request->state;
            $obj->save();
            return redirect()->action('SubcategoryController@List');
        } 
        catch (\Exception $e)
        {
            return redirect()->back();
        } 
    }

    public function Update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'id_category' => 'required',
            'state' => 'required',
        ]);

        try
        {   
          
            
            $obj = Subcategory::find($request->id_subcategory);
            $obj->id_category = $request->id_category;
            $obj->name = $request->name;
            $obj->description = $request->description;
            $obj->state = $request->state;
            $obj->update();
            return redirect()->action('SubcategoryController@List');
        } 
        catch (\Exception $e)
        {
            return redirect()->back();
        } 
    }

  
    public function Destroy($id)
    {
       
        $obj = Subcategory::find($id);
        $obj->state = 9;
        $obj->update();
        return redirect()->action('SubcategoryController@List');
        
    }
}
