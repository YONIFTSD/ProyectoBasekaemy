<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserType;

class UserController extends Controller
{
    public function List()
    {
        $users = User::where('state','<>',9)->get();
        return view('pages.users.list', [
            'users' => $users
        ]);
    }

    public function Add()
    {
        $userType = UserType::all();
        return view('pages.users.add', [
            'userType' => $userType,
        ]);
    }

    public function Edit($id)
    {
        $user = User::find($id);
        $userType = UserType::all();
        return view('pages.users.edit', [
            'user' => $user,
            'userType' => $userType
        ]);
    }


    public function Show($id)
    {
        $user = User::find($id);
        $userType = UserType::all();
        return view('pages.users.show', [
            'user' => $user,
            'userType' => $userType
        ]);
    }

    public function Store(Request $request)
    {
        $this->validate($request, [
            'id_user_type' => 'required',
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'state' => 'required'
        ]);

        try
        {
            $obj = new User();
            $obj->id_user_type = $request->id_user_type;
            $obj->name = $request->name;
            $obj->last_name = $request->last_name;
            $obj->phone = $request->phone;
            $obj->email = strtolower($request->email);
            $obj->password = bcrypt($request->password);
            $obj->state = $request->state;
            $obj->save();
            return redirect()->action('UserController@List');
        } 
        catch (\Exception $e)
        {
            return redirect()->back();
        } 
    }

    public function Update(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'id_user_type' => 'required',
            'name' => 'required',
            'last_name' => 'required',
            'state' => 'required'
        ]);

        

        try
        {
            $obj = User::find($request->user_id);
            $obj->id_user_type = $request->id_user_type;
            $obj->name = $request->name;
            $obj->last_name = $request->last_name;
            $obj->phone = $request->phone;
            $obj->state = $request->state;
            $obj->update();
            return redirect()->action('UserController@List');
        } 
        catch (\Exception $e)
        {
            return redirect()->back();
        } 
    }

    public function Destroy($id)
    {
       
        $obj = User::find($id);
        $obj->state = 9;
        $obj->update();
        return redirect()->action('UserController@List');
        
    }
}
