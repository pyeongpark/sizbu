<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Log;

use App\Laborer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class LaborerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $numInPage = Config::get('app.pagination');

        $all_laborer = DB::table('laborers')->orderBy('id', 'DESC')->paginate($numInPage);

        //Log::debug("BEEEEEE");

        return view('subviews/labor')->with('laborers', $all_laborer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'bail|required|max:30',
            'lastname' => 'bail|required|max:30',
            'country' => 'bail|required',
            'phonecode' => 'bail|required|max:5|regex:/^[0-9]+$/',
            'phonenumber' => 'bail|required|max:20',
            'email' => 'bail|required|email|max:50',
            'payment' => 'bail|required|max:10|regex:/^[0-9]+$/',
            'hours' => 'bail|required|max:10|regex:/^[0-9]+$/',
            'howmany' => 'bail|required|max:10|regex:/^[0-9]+$/',
            'product' => 'required|nullable',
            'description' => 'required|min:100',
        ]);

        $today = date('Y-m-d H:i:s');

        //Model class
        $laborer = new Laborer(); 

        $laborer->loginname = Auth::user()->name;
        $laborer->firstname = $request['firstname'];
        $laborer->lastname = $request['lastname'];
        $laborer->country = $request['country'];
        $laborer->phonecode = $request['phonecode'];
        $laborer->phonenumber = $request['phonenumber'];
        $laborer->email = $request['email'];
        $laborer->contactme = $request['contactme'];
        $laborer->howmany = $request['howmany'];
        $laborer->weekpay = $request['payment'];
        $laborer->weekhours = $request['hours'];
        $laborer->product = $request['product'];
        $laborer->description = $request['description'];
        $laborer->created_at = $today;
        
        $laborer->save();

        /* passed current url back2url in the form */
        $b2u = $request->input('back2url'); 

        return redirect($b2u);
    }

    public function sort($sortby)
    {
        $numInPage = Config::get('app.pagination');

        $sorted_labor = Laborer::orderBy($sortby)->paginate($numInPage);

        return redirect('/labor')->with('sortedlaborers', $sorted_labor);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function search(Request $request)
    {
        $q = $request['search'];

        $numInPage = Config::get('app.pagination');

        $searched = Laborer::where('lastname','LIKE','%'.$q.'%')->orWhere('firstname','LIKE','%'.$q.'%')->orWhere('description','LIKE','%'.$q.'%');
        $slaborers = $searched -> paginate($numInPage);

        // flash session
        return redirect('/searchedlabor')->with('slaborers', $slaborers);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        session_start();

        $edit_labor = DB::select('select * from laborers where id = ' . $id);

        $_SESSION['editLabor'] = $edit_labor;
        $_SESSION['editIdLabor'] = $id;

        return redirect('/editlabor');
    }


    public function delete($id)
    {
        $delete_laborer = DB::select('delete from laborers where id= '. $id);

        return redirect('/labor');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, $id)
     public function update(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'bail|required|max:30',
            'lastname' => 'bail|required|max:30',
            'country' => 'bail|required',
            'phonecode' => 'bail|required|max:5|regex:/^[0-9]+$/',
            'phonenumber' => 'bail|required|max:20',
            'email' => 'bail|required|email|max:50',
            'payment' => 'bail|required|max:10|regex:/^[0-9]+$/',
            'hours' => 'bail|required|max:10|regex:/^[0-9]+$/',
            'howmany' => 'bail|required|max:10|regex:/^[0-9]+$/',
            'product' => 'required|nullable',
            'description' => 'required|min:100',
        ]);

        $today = date('Y-m-d H:i:s');

        $id = $request['id'];

        $fname = $request['firstname'];
        $lname = $request['lastname'];
        $country = $request['country'];
        $pc = $request['phonecode'];
        $pn = $request['phonenumber'];
        $email = $request['email'];
        $cm = $request['contactme'];
        $howmany = $request['howmany'];
        $weekpay = $request['payment'];
        $weekhours = $request['hours'];
        $product = $request['product'];
        $des = $request['description'];
        $up_at = $today;

        DB::select("update laborers set firstname = '$fname', lastname = '$lname', country='$country', phonecode = '$pc', phonenumber = '$pn', email = '$email', contactme = $cm, weekpay = $weekpay, weekhours = $weekhours, howmany = $howmany, product = '$product', description = '$des', updated_at = '$up_at' where id=".$id);

        /* passed current url back2url in the form */
        $b2u = $request->input('back2url'); 

        return redirect($b2u);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
