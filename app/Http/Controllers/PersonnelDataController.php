<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use Illuminate\Http\Request;

class PersonnelDataController extends Controller
{
    public function index()
    {
        // $personnels = Personnel::all();
        return view('pages.personnelData.index');
    }

    public function create()
    {
        return view('pages.personnelData.create');
    }
}
