<?php

namespace App\Http\Controllers;

use App\Models\Attendents;
use Illuminate\Http\Request;
use App\Models\Student;

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
 dd($request);
    // if (!$student) {
    //     return response()->json(['status' => 'error', 'message' => 'Student not found']);
    // }

    // $hasPayment = Payment::where('student_id', $student->id)
    //     ->where('class_id', $request->class_id)
    //     ->whereMonth('payment_date', now()->month)
    //     ->whereYear('payment_date', now()->year)
    //     ->where('status', 'paid')
    //     ->exists();

       

    // if (!$hasPayment) {
    //     return response()->json([
    //         'status' => 'payment_required',
    //         'student_id' => $student->id,
    //         'message' => 'Payment not completed for this month.'
    //     ]);
    // }

    // Attendance::create([
    //     'student_id' => $student->id,
    //     'class_id' => $request->class_id,
    //     'attendance_date' => now()->toDateString(),
    //     'time_in' => now()->toTimeString(),
    //     'status' => 'present',
    //     'scanned_by' => auth()->user()->full_name ?? 'System',
    // ]);

    // return response()->json([
    //     'status' => 'success',
    //     'message' => 'Attendance marked for ' . $student->full_name
    // ]);
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
