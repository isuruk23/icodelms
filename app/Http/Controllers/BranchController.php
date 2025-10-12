<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Institute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $branches = Branch::get();
        return view('branches.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $institutes = Institute::all();
        return view('branches.create', compact('institutes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
            'institute_id' => 'required|exists:institutes,id',
            'branch_code' => 'required,branch_code',
        ]);

        $data = $request->all();
        $data['insert_userid'] = Auth::id();
          dd($data);
        Branch::create($data);
        return redirect()->route('branches.index')->with('success', 'Branch created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Branch $branch)
    {
        $institutes = Institute::all();
        return view('branches.edit', compact('branch', 'institutes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        $validated = $request->validate([
            'institute_id' => 'required|exists:institutes,id',
            'branch_code' => 'required|unique:branches,branch_code,' . $branch->id,
        ]);

        $branch->update($request->all());
        return redirect()->route('branches.index')->with('success', 'Branch updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        //
    }
}
