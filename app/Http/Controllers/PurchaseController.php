<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Purchase;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$all_purchase = Purchase::all();
        $all_purchase = DB::select('select * from purchases order by created_at DESC');

        return view('subviews/purchase')->with('purchases', $all_purchase);
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
            'phonecode' => 'bail|required|max:5|regex:/^[0-9]+$/',
            'phonenumber' => 'bail|required|max:20',
            'email' => 'bail|required|email|max:50',
            'product' => 'required|nullable',
            'description' => 'required|min:100',
        ]);

        $today = date('Y-m-d H:i:s');

        //Model class
        $purchase = new Purchase(); 

        $purchase->loginname = Auth::user()->name;
        $purchase->firstname = $request['firstname'];
        $purchase->lastname = $request['lastname'];
        $purchase->phonecode = $request['phonecode'];
        $purchase->phonenumber = $request['phonenumber'];
        $purchase->email = $request['email'];
        $purchase->contactme = $request['contactme'];
        $purchase->buysell = $request['buysell'];
        $purchase->product = $request['product'];
        $purchase->description = $request['description'];
        $purchase->created_at = $today;
        
        $purchase->save();

        /* passed current url back2url in the form */
        $b2u = $request->input('back2url'); 

        //Log::debug($b2u);

        return redirect($b2u);
    }

    /* PP : added for sorting the records */
    public function sort($sortby)
    {
        //if ($sortby === "created_at")
            //$sorted_purchase = DB::select('select * from purchases order by '.$sortby.' DESC');
        //else
            $sorted_purchase = DB::select('select * from purchases order by '.$sortby.' ASC');

        return redirect('/purchase')->with('sortedpurchases', $sorted_purchase);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
