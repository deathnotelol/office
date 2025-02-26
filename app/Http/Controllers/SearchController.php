<?php

namespace App\Http\Controllers;

use App\Models\CaseFile;
use App\Models\CaseList;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\PersonnelData;

class SearchController extends Controller
{
    public function caseFileSearch(Request $request)
    {
        $keyword = $request->keyword;
        $caseFiles = CaseFile::where('fileName', 'LIKE', "%$keyword%")
            ->orWhere('cabinetName', 'LIKE', "%$keyword%")
            ->orWhere('subDeptName', 'LIKE', "%$keyword%")
            ->orWhere('fileNumber', 'LIKE', "%$keyword%")
            ->get();

        return view('partials.caseFileRows', compact('caseFiles'));
    }

    public function departmentSearch(Request $request)
    {
        $keyword = $request->keyword;
        $departments = Department::where('deptNo', 'LIKE', "%$keyword%")
            ->orWhere('deptShortName', 'LIKE', "%$keyword%")
            ->orWhere('deptName', 'LIKE', "%$keyword%")
            ->orWhere('remark', 'LIKE', "%$keyword%")
            ->get();

        return view('partials.departmentRaw', compact('departments'));
    }

    public function caseListSearch(Request $request)
    {
        $keyword = $request->keyword;

        $caseLists = CaseList::where('status', 'LIKE', "%$keyword%")
            ->orWhere('inLetterContent', 'LIKE', "%$keyword%")
            ->orWhere('inLetterDate', 'LIKE', "%$keyword%")
            ->orWhere('inLetterNumber', 'LIKE', "%$keyword%")
            ->orWhereHas('caseFile', function ($query) use ($keyword) {
                $query->where('fileName', 'LIKE', "%$keyword%");
            })
            ->get();

        return view('partials.caseListRaw', compact('caseLists'));
    }

    public function personnelSearch(Request $request)
    {
        $keyword = $request->keyword;

        $personnels = PersonnelData::where('personnelId', 'LIKE', "%$keyword%")
        ->orWhere('personnelRank', 'LIKE', "%$keyword%")
        ->orWhere('personnelName', 'LIKE', "%$keyword%")
        ->orWhere('currentDuty', 'LIKE', "%$keyword%")
        ->orWhere('currentDept', 'LIKE', "%$keyword%")
        ->get();

        return view('partials.personnelRaw', compact('personnels'));
    }
}