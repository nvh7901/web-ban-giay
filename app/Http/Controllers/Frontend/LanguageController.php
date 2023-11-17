<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function viLanguage()
    {
        session()->get('language');
        session()->forget('language');
        Session::put('language', 'vi');
        return redirect()->back();
    }

    public function enLanguage()
    {
        session()->get('language');
        session()->forget('language');
        Session::put('language', 'en');
        return redirect()->back();
    }
}
