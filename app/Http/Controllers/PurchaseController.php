<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Purchase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$all_purchase = DB::select('select * from purchases order by created_at DESC');

        $numInPage = Config::get('app.pagination');

        $all_purchase = DB::table('purchases')->orderBy('id', 'DESC')->paginate($numInPage);

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
            'country' => 'bail|required',
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
        $purchase->country = $request['country'];
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
        $numInPage = Config::get('app.pagination');

        //$sorted_purchase = DB::select('select * from purchases order by '.$sortby.' ASC');
        $sorted_purchase = Purchase::orderBy($sortby)->paginate($numInPage);

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

    public function search(Request $request)
    {
        $q = $request['search'];

        //$searched = Purchases::where('description','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')//->orWhere('lastname','LIKE','%'.$q.'%')->get();

        $searched = DB::select("select * from purchases where description like '%{$q}%' or lastname like '%{$q}%' or firstname like '%{$q}%' order by created_at DESC");

        // flash session
        return redirect('/searchedpurchase')->with('search-result', $searched);

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

        $edit_purchase = DB::select('select * from purchases where id = ' . $id);

        $_SESSION['editPurchase'] = $edit_purchase;
        $_SESSION['editIdPurchase'] = $id;

        return redirect('/editpurchase');
    }

    public function delete($id)
    {
        $delete_purchase = DB::select('delete from purchases where id= '. $id);

        return redirect('/purchase');
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
        $bs = $request['buysell'];
        $product = $request['product'];
        $des = $request['description'];
        $up_at = $today;

        DB::select("update purchases set firstname = '$fname', lastname = '$lname', country='$country', phonecode = '$pc', phonenumber = '$pn', email = '$email', contactme = $cm, buysell = '$bs', product = '$product', description = '$des', updated_at = '$up_at' where id=".$id);

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
