<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class dilController extends Controller
{
    public function changeLocale () {
        // dd(session()->get('locale'));
        if(session()->get('locale') === 'tr') {
            session()->put('locale', 'en');
            App::setLocale('en');
        } else {
            session()->put('locale', 'tr');
            App::setLocale('tr');
        }
        return redirect()->back();
    }
}
