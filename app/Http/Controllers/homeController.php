<?php

namespace App\Http\Controllers;

use App\Models\routine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class homeController extends Controller
{
    public function dashboard()
    {
        $data = [];
        $data['nav'] = true;
        $data['aside'] = true;
        $data['routines'] = routine::select(['weeks'])
            ->where('status', 1)
            ->groupBy('weeks')
            ->get();
        $data['routine_subs'] = routine::with('subject','class_time')
            ->where('status', 1)
            ->get()
            ->groupBy('weeks');
//dd($data['routines']);
        return view('frontend.dashboard',$data);
    }

    public function profile()
    {
        $data = [];
        $data['nav'] = true;
        $data['aside'] = true;
        $data['info'] = User::select(['id','name','email','photo','phone_no'])
            ->where('id',auth()->user()->id)
            ->first();
        return view('frontend.profile',$data);
    }

    public function profile_info()
    {
        $data = [];
        $data['nav'] = true;
        $data['aside'] = true;
        $data['info'] = User::select(['id','name'])
            ->where('id',auth()->user()->id)
            ->first();
        return view('frontend.infoShow',$data);
    }

    public function profile_info_update(Request $request)
    {
        $request->validate([
           'name' => 'required|string',
        ]);
        $user = User::find(auth()->user()->id);
           $user->name = $request->input('name');
           $user->update();
        return redirect()->route('profile')->with('success','Updated successfully');
    }
    public function ppShow()
    {
        $data            = [];
        $data['nav'] = true;
        $data['aside'] = true;
        $data['patient'] = User::find(auth()->user()->id);
        return view('frontend.pp', $data);
    }

    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|max:10240',
        ]);
        $Photo = $request->file('photo');
//        dd($docPhoto);
        $Photo_file = uniqid('cp_', true) . Str::random(10) . '.' . $Photo->getClientOriginalExtension();
        if ($Photo->isValid()) {
            $Photo->storeAs('images', $Photo_file);
        }
        try{
            $uploadPhoto = User::find(auth()->user()->id);
            $uploadPhoto->update([
                'photo'=> $Photo_file,
            ]);
            return redirect()->back()->with('success','Updated successfully');

        }catch(\Exception $e){
            session()->flash('type', 'danger');
            session()->flash('message', $e->getMessage());
            return redirect()->back();
        }
    }



}
