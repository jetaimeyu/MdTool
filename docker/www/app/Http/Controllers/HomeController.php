<?php

namespace App\Http\Controllers;

use App\Imports\Member\ImportMainFactory;
use App\Models\MainFactory;
use App\Models\Supply;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('welcome');
    }

    public function importTest(Request $request)
    {
        Excel::import(new ImportMainFactory(), $request->file("ccfile"));
        return back()->with('success', 'All good!');
    }
}
