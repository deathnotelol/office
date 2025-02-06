<?php

namespace App\Http\Controllers;

use App\Models\CaseFile;
use Illuminate\Http\Request;

class CaseFileController extends Controller
{
    public function index(Request $request)
    {
        $cabinetName = $request->input('cabinetName');
        $subDeptName = $request->input('subDeptName');
    
        $query = CaseFile::query();
    
        // Apply filters
        if ($cabinetName) {
            $query->where('cabinetName', $cabinetName);
        }
    
        if ($subDeptName) {
            $query->where('subDeptName', $subDeptName);
        }
    
        $caseFiles = $query->paginate(10);
    
        // Fetch distinct cabinet and sub-department names for filter dropdowns
        $cabinetNames = CaseFile::distinct()->pluck('cabinetName');
        $subDeptNames = CaseFile::distinct()->pluck('subDeptName');
    
        return view('pages.caseFile.index', compact('caseFiles', 'cabinetNames', 'subDeptNames'));
    }

    public function create()
    {
        return view('pages.caseFile.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'fileNumber' => 'required|string|unique:case_files,fileNumber|max:255',
            'cabinetName' => 'required|string|max:255',
            'subDeptName' => 'required|string|max:255',
            'fileName' => 'required|string|max:255',
            'fileOpenDate' => 'required|date',
        ]);

        // Create a new CaseFile record
        CaseFile::create($validatedData);

        return redirect(route('caseFile.index'))->with('success', 'Case File created successfully');
    }

    public function edit($id)
    {
        // Find the specific case file by ID
        $caseFile = CaseFile::findOrFail($id);

        // Return a view with the case file data
        return view('pages.caseFile.edit', compact('caseFile'));
    }

    public function update(Request $request, $id)
    {
        // Find the specific case file
        $caseFile = CaseFile::findOrFail($id);

        // Validate the input data
        $validatedData = $request->validate([
            'fileNumber' => 'required|string|unique:case_files,fileNumber,' . $id . '|max:255',
            'cabinetName' => 'required|string|max:255',
            'subDeptName' => 'required|string|max:255',
            'fileName' => 'required|string|max:255',
            'fileOpenDate' => 'required|date',
        ]);

        // Update the case file
        $caseFile->update($validatedData);

        // Redirect with a success message
        return redirect()->route('caseFile.index')
            ->with('success', 'Case file updated successfully!');
    }

    public function destroy($id)
    {
        // Find the case file by ID
        $caseFile = CaseFile::findOrFail($id);

        // Delete the case file
        $caseFile->delete();

        // Redirect to the index page with a success message
        return redirect()->route('caseFile.index')
            ->with('success', 'Case file deleted successfully!');
    }
}
