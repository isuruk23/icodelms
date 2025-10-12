<?php

namespace App\Http\Controllers;

use App\Models\Attendents;
use Illuminate\Http\Request;

class AttendentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $student = Student::where('student_code', $request->student_code)->first();

        if (!$student) {
            return back()->with('error', 'Student not found');
        }

        Attendance::create([
            'student_id' => $student->id,
            'class_id' => $request->class_id,
            'attendance_date' => now()->toDateString(),
            'time_in' => now()->toTimeString(),
            'status' => 'present',
            'scanned_by' => auth()->user()->full_name ?? 'System'
        ]);

        return back()->with('success','Attendance marked for '.$student->full_name);
    }


    public function scan($class_id) {
        return view('attendance.scan', compact('class_id'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendents $attendents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendents $attendents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendents $attendents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendents $attendents)
    {
        //
    }
}
