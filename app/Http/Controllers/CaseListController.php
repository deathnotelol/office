<?php

namespace App\Http\Controllers;

use App\Models\CaseFile;
use App\Models\CaseList;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaseListController extends Controller
{

    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user is a super-admin
        if ($user->hasRole('super-admin')) {
            // Superadmin sees all CaseList entries
            $caseLists = CaseList::with('caseFile')->paginate(10);
        } else {
            // Non-super-admins can only see their own case lists
            $caseLists = CaseList::with('caseFile')
                ->where('user_id', $user->id) // Filter by the authenticated user's ID
                ->paginate(10);
        }

        // Return the case lists to the view
        return view('pages.caseList.index', compact('caseLists'));

    }


    public function create()
    {
        $departments = Department::all();
        $caseFiles = CaseFile::all();
        return view('pages.caseList.create', compact('departments', 'caseFiles'));
    }

    public function store(Request $request)
    {

        // Validate incoming data
        $validatedData = $request->validate([
            'file_id' => 'required|string',
            'status' => 'required|string',
            'inLetterDate' => 'nullable|date',
            'inLetterNumber' => 'nullable|string',
            'inLetterContent' => 'nullable|string',
            'fromDeptName' => 'nullable|string',
            'inLetterToDps' => 'nullable|date',
            'inLetterRemark' => 'nullable|string',
            'inLetterReturnDate' => 'nullable|date',
            'dpsRemark' => 'nullable|string',
            'psRemark' => 'nullable|string',
            'dmRemark' => 'nullable|string',
            'umRemark' => 'nullable|string',
            'outLetterDate' => 'nullable|date',
            'outLetterContent' => 'nullable|string',
            'outLetterNumber' => 'nullable|string',
            'deadlineDate' => 'nullable|date',
            'fromMPFReturnDate' => 'nullable|date',
            'fromMPFLetterNumber' => 'nullable|string',
            'fromMPFLetterContent' => 'nullable|string',
            'fromGADReturnDate' => 'nullable|date',
            'fromGADLetterNumber' => 'nullable|string',
            'fromGADLetterContent' => 'nullable|string',
            'fromBSIReturnDate' => 'nullable|date',
            'fromBSILetterNumber' => 'nullable|string',
            'fromBSILetterContent' => 'nullable|string',
            'fromPDReturnDate' => 'nullable|date',
            'fromPDLetterNumber' => 'nullable|string',
            'fromPDLetterContent' => 'nullable|string',
            'fromFSDReturnDate' => 'nullable|date',
            'fromFSDLetterNumber' => 'nullable|string',
            'fromFSDLetterContent' => 'nullable|string',
            'processToDps' => 'nullable|date',
            'processCaseRemark' => 'nullable|string',
            'processReturnDate' => 'nullable|date',
            'processCaseDpsRemark' => 'nullable|string',
            'processCasePsRemark' => 'nullable|string',
            'processCaseDmRemark' => 'nullable|string',
            'processCaseUmRemark' => 'nullable|string',
            'toRelevantDeptOutLetterDate' => 'nullable|date',
            'letterNumberOfRelevantDept' => 'nullable|string',
            'letterContentOfRelevantDept' => 'nullable|string',
            'toRelevantDeptName' => 'nullable|string',
            'otherAction' => 'nullable|string',
            'caseCompletedDate' => 'nullable|date',
            'relatedCaseFile' => 'nullable|string',  // Assuming this is a string, adjust as needed for file handling
            // 'toChildDeptName' is nullable and could be missing, so don't validate for existence
        ]);

        // If 'toChildDeptName' is present in the request, process it, otherwise set it as null
        $toChildDeptName = $request->input('toChildDeptName', null);

        if ($toChildDeptName && is_array($toChildDeptName)) {
            // If it's an array, we encode it as a JSON string
            $validatedData['toChildDeptName'] = json_encode($toChildDeptName);
        } else {
            // If it's null or empty, just set it as null
            $validatedData['toChildDeptName'] = null;
        }

        // Split the comma-separated file paths into an array
        // if ($request->has('relatedCaseFile') && is_string($validatedData['relatedCaseFile'])) {
        //     // Convert comma-separated string into an array
        //     $filePathsArray = explode(',', $validatedData['relatedCaseFile']);

        //     // Trim whitespace around each file path (optional but recommended)
        //     $filePathsArray = array_map('trim', $filePathsArray);

        //     // Store as JSON array in the database
        //     $validatedData['relatedCaseFile'] = json_encode($filePathsArray);
        // }

        if ($request->has('relatedCaseFile')) {
            // Ensure relatedCaseFile is an array before encoding
            $filePathsArray = is_array($request->relatedCaseFile) 
                ? $request->relatedCaseFile 
                : explode(',', $request->relatedCaseFile);
        
            // Trim whitespace around each file path (optional but recommended)
            $filePathsArray = array_map('trim', $filePathsArray);
        
            // Store as JSON array in the database (only encode once)
            $validatedData['relatedCaseFile'] = json_encode($filePathsArray, JSON_UNESCAPED_SLASHES);
        }


        // Create a new case list record
        $caseList = new CaseList([
            'file_id' => $validatedData['file_id'],
            'user_id' => $validatedData['user_id'] = Auth::id(),
            'status' => $validatedData['status'],
            'inLetterDate' => $validatedData['inLetterDate'],
            'inLetterNumber' => $validatedData['inLetterNumber'],
            'inLetterContent' => $validatedData['inLetterContent'],
            'fromDeptName' => $validatedData['fromDeptName'],
            'inLetterToDps' => $validatedData['inLetterToDps'],
            'inLetterRemark' => $validatedData['inLetterRemark'],
            'inLetterReturnDate' => $validatedData['inLetterReturnDate'],
            'dpsRemark' => $validatedData['dpsRemark'],
            'psRemark' => $validatedData['psRemark'],
            'dmRemark' => $validatedData['dmRemark'],
            'umRemark' => $validatedData['umRemark'],
            'outLetterDate' => $validatedData['outLetterDate'],
            'outLetterContent' => $validatedData['outLetterContent'],
            'outLetterNumber' => $validatedData['outLetterNumber'],
            'toChildDeptName' => $validatedData['toChildDeptName'],
            'deadlineDate' => $validatedData['deadlineDate'],
            'fromMPFReturnDate' => $validatedData['fromMPFReturnDate'],
            'fromMPFLetterNumber' => $validatedData['fromMPFLetterNumber'],
            'fromMPFLetterContent' => $validatedData['fromMPFLetterContent'],
            'fromGADReturnDate' => $validatedData['fromGADReturnDate'],
            'fromGADLetterNumber' => $validatedData['fromGADLetterNumber'],
            'fromGADLetterContent' => $validatedData['fromGADLetterContent'],
            'fromBSIReturnDate' => $validatedData['fromBSIReturnDate'],
            'fromBSILetterNumber' => $validatedData['fromBSILetterNumber'],
            'fromBSILetterContent' => $validatedData['fromBSILetterContent'],
            'fromPDReturnDate' => $validatedData['fromPDReturnDate'],
            'fromPDLetterNumber' => $validatedData['fromPDLetterNumber'],
            'fromPDLetterContent' => $validatedData['fromPDLetterContent'],
            'fromFSDReturnDate' => $validatedData['fromFSDReturnDate'],
            'fromFSDLetterNumber' => $validatedData['fromFSDLetterNumber'],
            'fromFSDLetterContent' => $validatedData['fromFSDLetterContent'],
            'processToDps' => $validatedData['processToDps'],
            'processCaseRemark' => $validatedData['processCaseRemark'],
            'processReturnDate' => $validatedData['processReturnDate'],
            'processCaseDpsRemark' => $validatedData['processCaseDpsRemark'],
            'processCasePsRemark' => $validatedData['processCasePsRemark'],
            'processCaseDmRemark' => $validatedData['processCaseDmRemark'],
            'processCaseUmRemark' => $validatedData['processCaseUmRemark'],
            'toRelevantDeptOutLetterDate' => $validatedData['toRelevantDeptOutLetterDate'],
            'letterNumberOfRelevantDept' => $validatedData['letterNumberOfRelevantDept'],
            'letterContentOfRelevantDept' => $validatedData['letterContentOfRelevantDept'],
            'toRelevantDeptName' => $validatedData['toRelevantDeptName'],
            'otherAction' => $validatedData['otherAction'],
            'caseCompletedDate' => $validatedData['caseCompletedDate'],
            'relatedCaseFile' => $validatedData['relatedCaseFile'],  // Adjust this to handle file uploads if needed
        ]);

        // Save the case list data
        $caseList->save();

        $user = Auth::user()->name;
        $message = "စာအမှတ် '{$caseList->inLetterNumber}' အား '{$user}' မှ ရေးသွင်းပါသည်။";
        $url = route('caseList.show', $caseList->id);

        // Using the NotificationController to send notification
        NotificationController::sendNotification($message, $url);

        // Return a success response
        return redirect()->route('caseList.index')->with('success', 'Case list created successfully.');
    }

    public function show($id)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Find the case list with the related caseFile
        $caseList = CaseList::with('caseFile')->findOrFail($id);
        $childDepartments = json_decode($caseList->toChildDeptName, true) ?? explode(',', $caseList->toChildDeptName);

        // First, decode the outer JSON string
        $files = json_decode($caseList->relatedCaseFile, true);

        // If the result is still a JSON string, decode again
        if (is_string($files)) {
            $files = json_decode($files, true);
        }

        // Ensure we have a valid array
        $relatedCaseFiles = is_array($files) ? $files : [];

        // Check if the user is a super-admin or owns the case list
        if ($user->hasRole('super-admin') || $caseList->user_id === $user->id) {
            return view('pages.caseList.show', compact('caseList', 'childDepartments', 'relatedCaseFiles'));
        } else {
            return redirect()->route('caseList.index')->with('error', 'Unauthorized access.');
        }
    }

    public function edit($id)
    {
        $caseList = CaseList::findOrFail($id);
        $caseList->toChildDeptName = json_decode($caseList->toChildDeptName, true); // Decode JSON to array
        $caseList->relatedCaseFile = json_decode($caseList->relatedCaseFile, true) ?? []; // Decode JSON to array
        $caseFiles = CaseFile::all();
        $departments = Department::all();
        return view('pages.caseList.edit', compact('caseList', 'caseFiles', 'departments'));
    }

    public function update(Request $request, $id)
    {
        // Retrieve the existing case list record by ID
        $caseList = CaseList::findOrFail($id);

        // Validate incoming data
        $validatedData = $request->validate([
            'file_id' => 'required|string',
            'status' => 'required|string',
            'inLetterDate' => 'nullable|date',
            'inLetterNumber' => 'nullable|string',
            'inLetterContent' => 'nullable|string',
            'fromDeptName' => 'nullable|string',
            'inLetterToDps' => 'nullable|date',
            'inLetterRemark' => 'nullable|string',
            'inLetterReturnDate' => 'nullable|date',
            'dpsRemark' => 'nullable|string',
            'psRemark' => 'nullable|string',
            'dmRemark' => 'nullable|string',
            'umRemark' => 'nullable|string',
            'outLetterDate' => 'nullable|date',
            'outLetterContent' => 'nullable|string',
            'outLetterNumber' => 'nullable|string',
            'deadlineDate' => 'nullable|date',
            'fromMPFReturnDate' => 'nullable|date',
            'fromMPFLetterNumber' => 'nullable|string',
            'fromMPFLetterContent' => 'nullable|string',
            'fromGADReturnDate' => 'nullable|date',
            'fromGADLetterNumber' => 'nullable|string',
            'fromGADLetterContent' => 'nullable|string',
            'fromBSIReturnDate' => 'nullable|date',
            'fromBSILetterNumber' => 'nullable|string',
            'fromBSILetterContent' => 'nullable|string',
            'fromPDReturnDate' => 'nullable|date',
            'fromPDLetterNumber' => 'nullable|string',
            'fromPDLetterContent' => 'nullable|string',
            'fromFSDReturnDate' => 'nullable|date',
            'fromFSDLetterNumber' => 'nullable|string',
            'fromFSDLetterContent' => 'nullable|string',
            'processToDps' => 'nullable|date',
            'processCaseRemark' => 'nullable|string',
            'processReturnDate' => 'nullable|date',
            'processCaseDpsRemark' => 'nullable|string',
            'processCasePsRemark' => 'nullable|string',
            'processCaseDmRemark' => 'nullable|string',
            'processCaseUmRemark' => 'nullable|string',
            'toRelevantDeptOutLetterDate' => 'nullable|date',
            'letterNumberOfRelevantDept' => 'nullable|string',
            'letterContentOfRelevantDept' => 'nullable|string',
            'toRelevantDeptName' => 'nullable|string',
            'otherAction' => 'nullable|string',
            'caseCompletedDate' => 'nullable|date',
            'relatedCaseFile' => 'nullable|string',
        ]);

        // Process 'toChildDeptName'
        $toChildDeptName = $request->input('toChildDeptName', null);
        if ($toChildDeptName && is_array($toChildDeptName)) {
            $validatedData['toChildDeptName'] = json_encode($toChildDeptName);
        } else {
            $validatedData['toChildDeptName'] = null;
        }

        // Process 'relatedCaseFile'
        // if ($request->has('relatedCaseFile') && is_string($validatedData['relatedCaseFile'])) {
        //     $filePathsArray = explode(',', $validatedData['relatedCaseFile']);
        //     $filePathsArray = array_map('trim', $filePathsArray);
        //     $validatedData['relatedCaseFile'] = json_encode($filePathsArray);
        // }

        // Process realtedCasefile
        if ($request->has('relatedCaseFile')) {
            // Ensure relatedCaseFile is an array before encoding
            $filePathsArray = is_array($request->relatedCaseFile) 
                ? $request->relatedCaseFile 
                : explode(',', $request->relatedCaseFile);
        
            // Trim whitespace around each file path (optional but recommended)
            $filePathsArray = array_map('trim', $filePathsArray);
        
            // Remove empty values (in case of extra commas)
            $filePathsArray = array_filter($filePathsArray);
        
            // Store as JSON array in the database (only encode once)
            $validatedData['relatedCaseFile'] = json_encode(array_values($filePathsArray), JSON_UNESCAPED_SLASHES);
        }

        

        // Update the existing case list record
        $caseList->update([
            'file_id' => $validatedData['file_id'],
            'user_id' => $validatedData['user_id'] = Auth::id(),
            'status' => $validatedData['status'],
            'inLetterDate' => $validatedData['inLetterDate'],
            'inLetterNumber' => $validatedData['inLetterNumber'],
            'inLetterContent' => $validatedData['inLetterContent'],
            'fromDeptName' => $validatedData['fromDeptName'],
            'inLetterToDps' => $validatedData['inLetterToDps'],
            'inLetterRemark' => $validatedData['inLetterRemark'],
            'inLetterReturnDate' => $validatedData['inLetterReturnDate'],
            'dpsRemark' => $validatedData['dpsRemark'],
            'psRemark' => $validatedData['psRemark'],
            'dmRemark' => $validatedData['dmRemark'],
            'umRemark' => $validatedData['umRemark'],
            'outLetterDate' => $validatedData['outLetterDate'],
            'outLetterContent' => $validatedData['outLetterContent'],
            'outLetterNumber' => $validatedData['outLetterNumber'],
            'toChildDeptName' => $validatedData['toChildDeptName'],
            'deadlineDate' => $validatedData['deadlineDate'],
            'fromMPFReturnDate' => $validatedData['fromMPFReturnDate'],
            'fromMPFLetterNumber' => $validatedData['fromMPFLetterNumber'],
            'fromMPFLetterContent' => $validatedData['fromMPFLetterContent'],
            'fromGADReturnDate' => $validatedData['fromGADReturnDate'],
            'fromGADLetterNumber' => $validatedData['fromGADLetterNumber'],
            'fromGADLetterContent' => $validatedData['fromGADLetterContent'],
            'fromBSIReturnDate' => $validatedData['fromBSIReturnDate'],
            'fromBSILetterNumber' => $validatedData['fromBSILetterNumber'],
            'fromBSILetterContent' => $validatedData['fromBSILetterContent'],
            'fromPDReturnDate' => $validatedData['fromPDReturnDate'],
            'fromPDLetterNumber' => $validatedData['fromPDLetterNumber'],
            'fromPDLetterContent' => $validatedData['fromPDLetterContent'],
            'fromFSDReturnDate' => $validatedData['fromFSDReturnDate'],
            'fromFSDLetterNumber' => $validatedData['fromFSDLetterNumber'],
            'fromFSDLetterContent' => $validatedData['fromFSDLetterContent'],
            'processToDps' => $validatedData['processToDps'],
            'processCaseRemark' => $validatedData['processCaseRemark'],
            'processReturnDate' => $validatedData['processReturnDate'],
            'processCaseDpsRemark' => $validatedData['processCaseDpsRemark'],
            'processCasePsRemark' => $validatedData['processCasePsRemark'],
            'processCaseDmRemark' => $validatedData['processCaseDmRemark'],
            'processCaseUmRemark' => $validatedData['processCaseUmRemark'],
            'toRelevantDeptOutLetterDate' => $validatedData['toRelevantDeptOutLetterDate'],
            'letterNumberOfRelevantDept' => $validatedData['letterNumberOfRelevantDept'],
            'letterContentOfRelevantDept' => $validatedData['letterContentOfRelevantDept'],
            'toRelevantDeptName' => $validatedData['toRelevantDeptName'],
            'otherAction' => $validatedData['otherAction'],
            'caseCompletedDate' => $validatedData['caseCompletedDate'],
            'relatedCaseFile' => $validatedData['relatedCaseFile'],
        ]);

        // Return a success response
        return redirect()->route('caseList.index')->with('success', 'Case list updated successfully.');
    }


    public function destroy($id)
    {
        // Find the case file by ID
        $caseList = CaseList::findOrFail($id);

        // Delete the case file
        $caseList->delete();

        // Redirect to the index page with a success message
        return redirect()->route('caseList.index')
            ->with('success', 'Case list deleted successfully!');
    }
}







