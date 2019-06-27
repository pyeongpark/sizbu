<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Log;
use App\Fund;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class FundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $numInPage = Config::get('app.pagination');

        $all_fund = DB::table('funds')->orderBy('id', 'DESC')->paginate($numInPage);

        return view('subviews/fund')->with('funds', $all_fund);
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
            'amount' => 'bail|required|max:10|regex:/^[0-9]+$/',
            'product' => 'required|nullable',
            'description' => 'required|min:100',
        ]);

        $today = date('Y-m-d H:i:s');

        //Model class
        $fund = new Fund(); 

        $fund->loginname = Auth::user()->name;
        $fund->firstname = $request['firstname'];
        $fund->lastname = $request['lastname'];
        $fund->country = $request['country'];
        $fund->phonecode = $request['phonecode'];
        $fund->phonenumber = $request['phonenumber'];
        $fund->email = $request['email'];
        $fund->contactme = $request['contactme'];
        $fund->amount = $request['amount'];
        $fund->product = $request['product'];
        $fund->description = $request['description'];
        $fund->created_at = $today;
        
        $fund->save();

        /* passed current url back2url in the form */
        $b2u = $request->input('back2url'); 

        //Log::debug($b2u);

        return redirect($b2u);
    }

     /* PP : added for sorting the records */
    public function sort($sortby)
    {
        $numInPage = Config::get('app.pagination');

        $sorted_fund = Fund::orderBy($sortby)->paginate($numInPage);

        return redirect('/fund')->with('sortedfunds', $sorted_fund);
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

        $searched = Fund::where('lastname','LIKE','%'.$q.'%')->orWhere('firstname','LIKE','%'.$q.'%')->orWhere('description','LIKE','%'.$q.'%');
        $sfunds = $searched -> paginate($numInPage);

        // flash session
        return redirect('/searchedfund')->with('sfunds', $sfunds);

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

        $edit_fund = DB::select('select * from funds where id = ' . $id);

        $_SESSION['editFund'] = $edit_fund;
        $_SESSION['editIdFund'] = $id;

        return redirect('/editfund');
    }

     public function delete($id)
    {
        $delete_fund = DB::select('delete from funds where id= '. $id);

        return redirect('/fund');
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
            'amount' => 'bail|required|max:10|regex:/^[0-9]+$/',
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
        $amount = $request['amount'];
        $product = $request['product'];
        $des = $request['description'];
        $up_at = $today;

        DB::select("update funds set firstname = '$fname', lastname = '$lname', country='$country', phonecode = '$pc', phonenumber = '$pn', email = '$email', contactme = $cm, amount = $amount, product = '$product', description = '$des', updated_at = '$up_at' where id=".$id);

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
