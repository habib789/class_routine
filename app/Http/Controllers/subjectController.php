<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class subjectController extends Controller
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
        $data['subjects'] = Subject::get();
        return view('backend.subject', $data);
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
            'subject_name' => 'required|string|unique:subjects,subject_name,',
        ],
            [
                'subject_name.required' => 'Subject name cannot be empty',
            ]
        );
        $inputs = [
            'subject_name' => trim($request->input('subject_name')),
            'updated_by'   => trim($request->input('updated_by')),
            'created_by'   => trim($request->input('created_by')),
        ];
        try {
            Subject::create($inputs);
            return redirect()->route('subjects.index')->with('success','successfully created a course');
        } catch (\Exception $e) {
            session()->flash('type', 'danger');
            session()->flash('message', $e->getMessage());
            return redirect()->back();
        }
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
        $data          = [];
        $data['nav']   = true;
        $data['aside'] = true;
        $data['sub']   = Subject::find($id);
        return view('backend.subEdit', $data);
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
        $request->validate([
            'subject_name' => 'required|string|unique:subjects,subject_name,' . $id,
        ]);

        $inputs = Subject::find($id);
        try {
            $inputs->update([
                'subject_name' => trim($request->input('subject_name')),
                'status'       => $request->input('status'),
            ]);
            return redirect()->route('subjects.index')->with('success','Updated Successfully');
        } catch (\Exception $e) {
            session()->flash('type', 'danger');
            session()->flash('message', $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Subject::find($id);
        $cat->delete();
        return redirect()->route('subjects.index')->with('success','successfully Deleted');
    }
}
