<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;


use App\Models\Branch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branches = Branch::get();
        return view('students.create', compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
             $validated = $request->validate([
            'student_code' => 'required|unique:students|max:20',
            'full_name' => 'required|max:100',
            'branch_id' => 'required|exists:branches,id',
            'photo_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'barcode_image_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except(['photo_path', 'barcode_image_path']);
        $data['insert_userid'] = Auth::id();


        // $qrCode = QrCode::format('png')
        //     ->size(200)
        //     ->generate($request->student_code);

            $path = 'qrcodes/'.$request->student_code.'.png';
            // Storage::disk('public')->put($path, $qrCode);

            
            $data['barcode_image_path'] = $path;

        // Handle uploads
        if ($request->hasFile('photo_path')) {
            $data['photo_path'] = $request->file('photo_path')->store('students/photos', 'public');
        }
      

        Student::create($data);
        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'student_code' => 'required|max:20|unique:students,student_code,' . $student->id,
            'full_name' => 'required|max:100',
            'branch_id' => 'required|exists:branches,id',
            'photo_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'barcode_image_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except(['photo_path', 'barcode_image_path']);

        // Uploads
        if ($request->hasFile('photo_path')) {
            if ($student->photo_path) Storage::disk('public')->delete($student->photo_path);
            $data['photo_path'] = $request->file('photo_path')->store('students/photos', 'public');
        }

        if ($request->hasFile('barcode_image_path')) {
            if ($student->barcode_image_path) Storage::disk('public')->delete($student->barcode_image_path);
            $data['barcode_image_path'] = $request->file('barcode_image_path')->store('students/barcodes', 'public');
        }

        $student->update($data);
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        Student::destroy($id);
        return redirect()->route('students.index')->with('success', 'Student deleted!');
    }
}
