<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;

class LocalizationController extends Controller
{
    /**
	 * @param Request $request [description]
	 * @return [type] [description]
	 */
	
	public function index($locale)
    {   

        session()->put('locale', $locale);

        return redirect()->back();
    }
}
