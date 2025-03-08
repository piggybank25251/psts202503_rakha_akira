<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $students = \App\Models\Students::latest()->paginate(10);
    $data['students'] = $students;
    return view('students_index', $data);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'name'          => 'required',
            'gender' => 'required|in:male,female',
            'email'        => 'nullable',
            'phone'          => 'required|numeric',
            'grade'          => 'required',
        ]);
        $students = new \App\Models\Students();
        $students->name = $requestData['name'];
        $students->gender = $requestData['gender'];
        $students->email = $requestData['email'];
        $students->phone = $requestData['phone'];
        $students->grade = $requestData['grade'];
        
        $students->save();
        return redirect('/students')->with('notice', 'Data has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['students'] = \App\Models\Students::findOrFail($id);
    return view('students_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'name'          => 'required|min:2',
            'gender' => 'required|in:male,female',
            'email'        => 'nullable',
            'phone'          => 'required|numeric',
            'grade'          => 'required',
        ]);
        $students = \App\Models\Students::findOrFail($id);
        $students->name = $requestData['name'];
        $students->gender = $requestData['gender'];
        $students->email = $requestData['email'];
        $students->phone = $requestData['phone'];
        $students->grade = $requestData['grade'];

        $students->save();
        return redirect('/students')->with('notice', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $students = \App\Models\Students::findOrFail($id);
        $students->delete();
        return back()->with('notice', 'Data has been deleted');
    }
}
