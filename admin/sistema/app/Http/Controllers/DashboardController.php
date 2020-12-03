<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function Dashboard()
    {
        return view('auth.dashboard');
    }

    public function Profile()
    {
        $user = Auth::user();
        return view('auth.profile', [
            'user' => $user
        ]);
    }

    public function UpdateProfile(Request $request)
    {
        try
        {
            $user_id = Auth::user()->id;
            $obj = User::find($user_id);
            $obj->name = $request->name;
            $obj->last_name = $request->last_name;
            $obj->phone = $request->phone;
            $obj->update();
            return redirect()->action('DashboardController@Profile');
        } 
        catch (QueryException $e)
        {
            return redirect()->back();
        } 
    }

    public function ChangePassword(Request $request)
    {
        try
        {
            if(Hash::check($request->oldpassword, Auth::user()->password))
            {
                $user_id = Auth::user()->id;
                $obj = User::find($user_id);
                $obj->password = bcrypt($request->newpassword);
                $obj->update();
                return redirect()->action('DashboardController@Profile');
            }
            return redirect()->back();
            
        } 
        catch (QueryException $e)
        {
            return redirect()->back();
        } 
    }
}
