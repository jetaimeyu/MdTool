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
        $mainFactory = MainFactory::find(31);
        var_dump($mainFactory->suppliers);
      
        $mainFactory->each(function ($model){
              dd(1);
            return $model->Name;
        });
        dd($mainFactory);
        $mainFactory->suppliers()->map(function ($item){
            var_dump($item);
        });
    dd($mainFactory->suppliers);
        return view('welcome');
    }

    public function importTest(Request $request)
    {
        Excel::import(new ImportMainFactory(), $request->file("ccfile"));
        return back()->with('success', 'All good!');
    }
}
