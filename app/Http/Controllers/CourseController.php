<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Course::create($request->all());
        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
            $course = Course::findOrFail($id);
            return view('courses.edit', compact('course'));
        }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $course = Course::findOrFail($id);
        $course->update($request->all());
        return redirect()->route('courses.index');
    }


    /**
     * Remove the specified resource from storage.
     */
     public function destroy($id) {
        Course::destroy($id);
        return redirect()->route('courses.index');
    }
}
