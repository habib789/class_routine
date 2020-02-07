<?php

namespace App\Http\Controllers;

use App\Models\Class_time;
use App\Models\routine;
use App\Models\Subject;
use Illuminate\Http\Request;

class routinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data             = [];
        $data['nav']      = true;
        $data['aside']    = true;
        $data['subjects'] = Subject::where('status', 1)->get();
        $data['times']    = Class_time::where('status', 1)->get();
        return view('backend.routine', $data);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'time'    => 'required',
            'weeks'   => 'required',
        ]);
        $routine = routine::select('class_time_id','subject_id')->get();

            foreach ($routine as $rot)
                echo $rot->subject_id;
//                    dd();
        $eub = $request->input('subject');
       $routine = routine::where('subject');
        routine::create([
            'subject_id'    => $request->input('subject'),
            'class_time_id' => $request->input('time'),
            'weeks'         => $request->input('weeks'),
            'updated_by'    => trim($request->input('updated_by')),
            'created_by'    => trim($request->input('created_by')),
        ]);
        return redirect()->route('routines.index')->with('success','Schedule created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
