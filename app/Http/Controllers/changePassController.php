<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class changePassController extends Controller
{
    public function changePass()
    {
        $data = [];
        $data['nav'] = true;
        $data['aside'] = true;
        return view('frontend.passChange',$data);
    }

    public function changePassProcess(Request $request)
    {
//        return $request->all();
        $request->validate([
           'current_pass' =>'required',
           'password' =>'required|confirmed',
           'password_confirmation' =>'required',
        ]);
        $hashedPass = Auth::user()->password;
        if (Hash::check($request->input('current_pass'),$hashedPass)){
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->update();
            return redirect()->route('profile')->with('success','Password updated successfully');
        }
        return redirect()->back()->with('error','Current password doesnt match');
    }
}
