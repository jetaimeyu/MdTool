<?php

namespace App\Http\Controllers;

use App\Models\MainFactory;
use App\Models\Supply;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
      $mainFactory = MainFactory::find(31);

      dump(gettype($mainFactory->supplies));
      dump($mainFactory->details);
        dump($mainFactory->supplies, count($mainFactory->supplies));

//      var_dump($mainFactory->supplies);
//        dump($mainFactory);

//        $supply =Supply::find(1);
//        dump($supply);
//        dump($supply->mainFactory);
//        dump($supply->mainFactory->Name);
    }
}
