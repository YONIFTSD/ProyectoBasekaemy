<?php

namespace App\Http\Controllers;

use App\Models\CoverPage;
use Illuminate\Http\Request;

class CoverPageController extends Controller
{
    public function List()
    {
        $covers_page = CoverPage::where('state','<>',9)->get();
        return view('pages.covers_page.list', [
            'covers_page' => $covers_page
        ]);
    }


    public function Add()
    {
        return view('pages.covers_page.add');
    }

 
   

 
    public function Show($id)
    {
        $cover_page = CoverPage::find($id);
        return view('pages.covers_page.view', [
            'cover_page' => $cover_page
        ]);
    }

  
    public function Edit($id)
    {
        $cover_page = CoverPage::find($id);
        return view('pages.covers_page.edit', [
            'cover_page' => $cover_page
        ]);
    }

    public function Store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required',
            'state' => 'required'
        ]);

        try
        {
            $name_file = "";
            if ($request->hasFile('image')){
                $filenamenewextension = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($filenamenewextension,PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $filenamestore = $filename."_".time().".".$extension;
                $name_file = $request->file('image')->storeAs(
                            'public/covers_page', $filenamestore
                        );
                $name_file = '/storage/covers_page/'.$filenamestore;
            }
   

            $obj = new CoverPage();
            $obj->title = $request->title;
            $obj->description = $request->description;
            $obj->image = $name_file;
            $obj->url = $request->url;
            $obj->state = $request->state;
            $obj->save();
            return redirect()->action('CoverPageController@List');
        } 
        catch (\Exception $e)
        {
            return redirect()->back();
        } 
    }

    public function Update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'state' => 'required',
        ]);

        try
        {

            $name_file = "";
            if ($request->hasFile('image')){
                $filenamenewextension = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($filenamenewextension,PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $filenamestore = $filename."_".time().".".$extension;
                $name_file = $request->file('image')->storeAs(
                            'public/covers_page', $filenamestore
                        );
                $name_file = '/storage/covers_page/'.$filenamestore;
            }

            $obj = CoverPage::find($request->id_cover_page);
            $obj->title = $request->title;
            $obj->description = $request->description;
            if (!empty($name_file)) {
                $obj->image = $name_file;    
            }
            $obj->url = $request->url;
            $obj->state = $request->state;
            $obj->update();
            return redirect()->action('CoverPageController@List');
        } 
        catch (\Exception $e)
        {
            return redirect()->back();
        } 
    }


    public function Destroy($id)
    {
       
        $obj = CoverPage::find($id);
        $obj->state = 9;
        $obj->update();
        return redirect()->action('CoverPageController@List');
        
    }
}
