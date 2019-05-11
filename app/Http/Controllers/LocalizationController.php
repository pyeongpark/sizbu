<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    public function index($locale)
    {   
        session()->put('locale', $locale);

        return redirect()->back();
    }
}
