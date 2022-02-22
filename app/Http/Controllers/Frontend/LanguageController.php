<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     *  for english
     */
    public function english()
    {
        session() -> get('language');
        session()-> forget('language');
        Session::put('language','english');
        return redirect() -> back();
    }
    /**
     *  for english
     */
    public function bangla()
    {
        session() -> get('language');
        session()-> forget('language');
        Session::put('language','bangla');
        return redirect() -> back();
    }
}
