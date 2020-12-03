<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function List()
    {
        $categories = Category::where('state','<>',9)->get();
        return view('pages.categories.list', [
            'categories' => $categories
        ]);
    }


    public function Add()
    {
        return view('pages.categories.add');
    }

 
   

 
    public function Show($id)
    {
        $category = Category::find($id);
        return view('pages.categories.view', [
            'category' => $category
        ]);
    }

  
    public function Edit($id)
    {
        $category = Category::find($id);
        return view('pages.categories.edit', [
            'category' => $category
        ]);
    }

    public function Store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            'state' => 'required'
        ]);

        try
        {   

            $path_file = "";
        
            if ($request->hasFile('image')){
                $filenamenewextension = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($filenamenewextension,PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $filenamestore = $filename."_".time().".".$extension;
                $path_file = $request->file('image')->storeAs(
                            'public/category', $filenamestore
                        );
                $path_file = '/storage/category/'.$filenamestore;
            }

            $obj = new Category();
            $obj->name = $request->name;
            $obj->description = $request->description;
            $obj->image = $path_file;
            $obj->order_item = 0;
            $obj->state = $request->state;
            $obj->save();
            return redirect()->action('CategoryController@List');
        } 
        catch (\Exception $e)
        {
            return $e;
            return redirect()->back();
        } 
    }

    public function Update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'state' => 'required',
        ]);

        try
        {   

            $path_file = "";
        
            if ($request->hasFile('image')){
                $filenamenewextension = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($filenamenewextension,PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $filenamestore = $filename."_".time().".".$extension;
                $path_file = $request->file('image')->storeAs(
                            'public/category', $filenamestore
                        );
                $path_file = '/storage/category/'.$filenamestore;
            }

            $obj = Category::find($request->id_category);
            $obj->name = $request->name;
            $obj->description = $request->description;
            $obj->image = $path_file;
            $obj->state = $request->state;
            $obj->update();
            return redirect()->action('CategoryController@List');
        } 
        catch (\Exception $e)
        {
            return redirect()->back();
        } 
    }


    public function Destroy($id)
    {
       
        $obj = Category::find($id);
        $obj->state = 9;
        $obj->update();
        return redirect()->action('CategoryController@List');
        
    }


}
