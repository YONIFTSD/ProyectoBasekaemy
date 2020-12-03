<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function List()
    {
        $clients = Client::where('state','<>',9)->get();
        return view('pages.clients.list', [
            'clients' => $clients
        ]);
    }


    public function Add()
    {
        return view('pages.clients.add');
    }

 
   

 
    public function Show($id)
    {
        $client = Client::find($id);
        return view('pages.clients.view', [
            'client' => $client
        ]);
    }

  
    public function Edit($id)
    {
        $client = Client::find($id);
        return view('pages.clients.edit', [
            'client' => $client
        ]);
    }

    public function Store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'image' => 'required',
        //     'state' => 'required'
        // ]);

        try
        {
            $obj = new Client();
            $obj->document_type = $request->document_type;
            $obj->document_number = $request->document_number;
            $obj->name = $request->name;
            $obj->last_name = '';
            $obj->phone = $request->phone;
            $obj->ubigee = $request->ubigee;
            $obj->address = $request->address;
            $obj->email = strtolower($request->email);
            $obj->password = bcrypt($request->password);
            $obj->birth_date = $request->birth_date;
            $obj->sex = $request->sex;
            $obj->state = $request->state;
            $obj->save();
            return redirect()->action('ClientController@List');
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
            $obj = Client::find($request->id_client);
            $obj->document_type = $request->document_type;
            $obj->document_number = $request->document_number;
            $obj->name = $request->name;
            // $obj->last_name = $request->last_name;
            $obj->phone = $request->phone;
            $obj->ubigee = $request->ubigee;
            $obj->address = $request->address;
            // $obj->email = $request->email;
            // $obj->password = $request->password;
            $obj->birth_date = $request->birth_date;
            $obj->sex = $request->sex;
            $obj->state = $request->state;
            $obj->update();
            return redirect()->action('ClientController@List');
        } 
        catch (\Exception $e)
        {
            return redirect()->back();
        } 
    }

    public function Destroy($id)
    {
       
        $obj = Client::find($id);
        $obj->state = 9;
        $obj->update();
        return redirect()->action('ClientController@List');
        
    }

}
