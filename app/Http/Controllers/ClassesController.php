<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $classes = Classes::with(['course', 'teacher', 'branch'])->get();
        return view('classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('classes.create', [
            'courses' => Course::all(),
            'teachers' => Teacher::all(),
            'branches' => Branch::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'class_code' => 'required|unique:classes|max:20',
            'course_id' => 'required|exists:courses,id',
            'teacher_id' => 'required|exists:teachers,id',
            'branch_id' => 'required|exists:branches,id',
        ]);

        $data = $request->all();
        $data['insert_userid'] = Auth::id();

        Classes::create($data);

        return redirect()->route('classes.index')->with('success', 'Class created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classes $classes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classes $class)
    {
        return view('classes.edit', [
            'class' => $class,
            'courses' => Course::all(),
            'teachers' => Teacher::all(),
            'branches' => Branch::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classes $class)
    {
        $request->validate([
            'class_code' => 'required|max:20|unique:classes,class_code,' . $class->id,
            'course_id' => 'required|exists:courses,id',
            'teacher_id' => 'required|exists:teachers,id',
            'branch_id' => 'required|exists:branches,id',
        ]);

        $class->update($request->all());

        return redirect()->route('classes.index')->with('success', 'Class updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classes $classes)
    {
        //
    }
}
