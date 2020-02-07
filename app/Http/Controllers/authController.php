<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class authController extends Controller
{
    public function index()
    {
        $data          = [];
        $data['nav']   = false;
        $data['aside'] = false;
        return view('frontend.login', $data);
    }

    public function regShow()
    {
        $data          = [];
        $data['nav']   = false;
        $data['aside'] = false;
        return view('frontend.register', $data);
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'phone_no' => 'required|max:11|min:11|unique:users,phone_no,',
            'email'    => 'required|email|unique:users,email,',
            'password' => 'required|min:6',
            'photo'    => 'required|image|max:10240',
        ]);
        $image      = $request->file('photo');
        $image_file = uniqid('pp_', true) . Str::random(10) . '.' . $image->getClientOriginalExtension();
        if ($image->isValid()) {
            $image->storeAs('images', $image_file);
        }
        try {
            User::create([
                'name'     => trim($request->input('name')),
                'email'    => trim($request->input('email')),
                'password' => bcrypt(trim($request->input('password'))),
                'phone_no' => trim($request->input('phone_no')),
                'photo'    => $image_file,
            ]);
//            session()->flash('type','success');
//            session()->flash('message','Successfully Registered!! You can now login');
            return redirect()->route('login')->with('success', 'Registered successfully');
        } catch (\Exception $e) {
            session()->flash('type', 'danger');
            session()->flash('message', $e->getMessage());
            return redirect()->back();
        }
    }

    public function LoginProcess(Request $request)
    {
        $request->validate([
            'phone_no' => 'required|max:11|min:11',
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only(['phone_no', 'email', 'password']);
        if (auth()->attempt($credentials)) {
            return redirect()->route('dashboard');
        }
        session()->flash('type','danger');
        session()->flash('message','Invalid Login');
        return redirect()->back();

    }

    public function logout()
    {
        Auth::logout();
        session()->flash('type', 'info');
        session()->flash('message', 'You have been logged out');
        return redirect()->route('login');
    }
}
