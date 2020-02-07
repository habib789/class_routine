<?php

namespace App\Http\Controllers;

use App\Models\Class_time;
use Illuminate\Http\Request;

class timesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data            = [];
        $data['nav']     = true;
        $data['aside']   = true;
        $data['times'] = Class_time::get();
        return view('backend.classTime', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'time_duration' => 'required|string|unique:class_times,time_duration,',
        ],
            [
                'time_duration.required' => 'Please select a time schedule!',
            ]

        );
        $inputs = [
            'time_duration' => trim($request->input('time_duration')),
            'updated_by'   => trim($request->input('updated_by')),
            'created_by'   => trim($request->input('created_by')),
        ];
        try {
            Class_time::create($inputs);
            return redirect()->route('times.index')->with('success','Time schedule created successfully');
        } catch (\Exception $e) {
            session()->flash('type', 'danger');
            session()->flash('message', $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Class_time::find($id);
        $cat->delete();
        return redirect()->route('times.index')->with('success','successfully Deleted');
    }
}
