<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstituteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $institutes = Institute::all();
        return view('institutes.index', compact('institutes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('institutes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['insert_by'] = Auth::id();

       
        Institute::create($data);

        return redirect()->route('institutes.index')->with('success', 'Institute added successfully.');
    }

    /**
     * Display the specified resource.
     */
   public function show($id)
    {
        $institute = Institute::findOrFail($id);
        return view('institutes.show', compact('institute'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $institute = Institute::findOrFail($id);
        return view('institutes.edit', compact('institute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $institute = Institute::findOrFail($id);
        $institute->update($request->all());

        return redirect()->route('institutes.index')->with('success', 'Institute updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Institute $institute)
    {
        //
    }
}
