<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NotificationController;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $deptNames = $request->input('deptName');

        $query = Department::query();

        // Apply filters

        if ($deptNames) {
            $query->where('deptName', $deptNames);
        }

        $departments = $query->paginate(10);

        // Fetch distinct cabinet and sub-department names for filter dropdowns
        $deptNames = Department::distinct()->pluck('deptName');

        return view('pages.departments.index', compact('departments', 'deptNames'));
    }

    public function show($id)
    {
        $department = Department::findOrFail($id);
        return view('pages.departments.show', compact('department'));
    }

    public function create()
    {
        return view('pages.departments.create');
    }
    public function store(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'deptNo' => 'required|string|unique:departments,deptNo|max:255',
            'deptShortName' => 'required|string|max:255',
            'deptName' => 'required|string|max:255',
            'remark' => 'nullable|string|max:255', // Allow null values
        ]);

        // Create the new department record
        $department = Department::create($validatedData);

        $user = Auth::user()->name;
        $message = "A new department '{$department->deptShortName}' has been added by '{$user}'.";
        $url = route('department.show', $department->id);

        // Using the NotificationController to send notification
        NotificationController::sendNotification($message, $url);

        return redirect(route('department.index'))->with('success', 'Department created successfully');
    }

    public function edit($id)
    {
        // Find the specific case file by ID
        $department = Department::findOrFail($id);

        // Return a view with the case file data
        return view('pages.departments.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        // Find the specific case file
        $department = Department::findOrFail($id);

        // Validate the input data
        $validatedData = $request->validate([
            'deptNo' => 'required|string|unique:departments,deptNo,' . $id . '|max:255',
            'deptShortName' => 'required|string|max:255',
            'deptName' => 'required|string|max:255',
            'remark' => 'nullable|string|max:255', // Allow null values
        ]);

        // Update the case file
        $department->update($validatedData);

        // Redirect with a success message
        return redirect()->route('department.index')
            ->with('success', 'Department updated successfully!');
    }

    public function destroy($id)
    {
        // Find the case file by ID
        $departments = Department::findOrFail($id);

        // Delete the case file
        $departments->delete();

        // Redirect to the index page with a success message
        return redirect()->route('department.index')
            ->with('success', 'Department deleted successfully!');
    }
}
