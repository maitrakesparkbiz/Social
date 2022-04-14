<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    //
    public function index($locate)
    {
        app()->setLocale($locate);
        session()->put('lang',$locate);
        
        return $locate;
    }

}
