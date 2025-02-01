<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function languageSwitch(Request $request)
    {
        if($request->lang =="English")
        {
         $eng = "en";
           app::setLocale($eng);
           session()->put('locale', $eng);
           return redirect()->back();
        }
        else{
           $eng = "ar";
           app::setLocale($eng);
           session()->put('locale', $eng);
           return redirect()->back();
        }
    }
}
