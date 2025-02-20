<?php

namespace App\Http\Controllers;

use App\Models\CaseFile;
use App\Models\CaseList;
use App\Models\Department;
use App\Models\DutyReport;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $caseLists = CaseList::count();
        $caseFiles = CaseFile::count();
        $departments = Department::count();
        $dutyReports = DutyReport::count();
    
        // Example: Assuming total reports is 100 (can be dynamically calculated based on your use case)
        // $totalReports = 100;
        // $progress = $totalReports > 0 ? ($dutyReports / $totalReports) * 100 : 0;
    
        return view('pages.dashboard', compact('caseLists', 'caseFiles', 'departments', 'dutyReports'));
    }
}
