<?php

namespace App\Http\Controllers;

use App\Deposit;
use App\Wallet;

use Illuminate\Http\Request;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('funds.deposit');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('funds.deposit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'amount' => 'required'
        ]);
        // $deposit= new Deposit();
        // $deposit->amount=$request->post('amount');
        // $deposit->save();
            $amount = $request->amount;

            try {
                $wallet = Wallet::where('users_id', Auth()->user()->id)->firstOrFail();
                        } catch (\Exception $e) {
                $error = $e->getMessage();
                        }
        
        
        if(isset($error)){
            $wallet = new Wallet;

            $wallet->current_balance = $amount;
            $wallet->users_id = Auth()->user()->id;
            $wallet->save();
        }else{
            $wallet->current_balance += $amount;
            $wallet->save();
        }

        return redirect('home')->with('success','Deposit successful, balance increased');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */

     public function redirect_to_paystack(Request $request){
        $this->validate($request, [
            'amount' => 'required'
        ]);
        //    die ('here');
        return view('funds.paystack')->with('amount', $request->amount);
    
     }

    public function show(Deposit $deposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function edit(Deposit $deposit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deposit $deposit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deposit $deposit)
    {
        //
    }
}
