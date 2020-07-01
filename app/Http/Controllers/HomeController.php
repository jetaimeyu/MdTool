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
    use jsonResponse;

    public function index()
    {
        return "暂未开放";
    }

    public function importTest(Request $request)
    {
        Excel::import(new ImportMainFactory(), $request->file("ccfile"));
        return back()->with('success', 'All good!');
    }

    public function show(Supply $supply)
    {
        return new \App\Http\Resources\Supply($supply);

        $supply =Supply::find($id);
        if ($supply===null){
            return $this->jsonFail('数据不存在');
        }
        return $this->jsonSuccess($supply->toArray());
    }

}
