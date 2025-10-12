<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Branch;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $teachers = Teacher::get();
        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branches = Branch::all();
        return view('teachers.create', compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'full_name' => 'required|max:100',
            'branch_id' => 'required|exists:branches,id',
        ]);

        $data = $request->all();
        $data['insert_userid'] = Auth::id();

        Teacher::create($data);
        return redirect()->route('teachers.index')->with('success', 'Teacher added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(Teacher $teacher)
    {
        $branches = Branch::all();
        return view('teachers.edit', compact('teacher', 'branches'));
    }


    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'full_name' => 'required|max:100',
            'branch_id' => 'required|exists:branches,id',
        ]);

        $teacher->update($request->all());
        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
