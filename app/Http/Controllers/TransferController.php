<?php

namespace App\Http\Controllers;

use App\Transfer;
use Illuminate\Http\Request;
use App\User;
use App\Wallet;
class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $users = User::where('id', '!=', auth()->id())->get();

    return view('funds.transfer')->with([ 'users' => $users ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('funds.transfer');
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
            'amount' => 'required',
            'user_id' => 'required',

        ]);
        $sender_wallet = Wallet::where('users_id', auth()->id())->first();
        $sender_balance = $sender_wallet->current_balance ?? 0;

        try{
            $receiver_wallet = Wallet::where('users_id', $request->use_id)->firstOrFail();
        }catch(\Exception $e){
            $error = $e->getMessage();
        }

        if(isset($error)) {
            $receiver_wallet = new Wallet;
            $receiver_wallet->users_id = $request->user_id;
        }


        if ($sender_balance >= $request->amount) {
            $receiver_wallet->current_balance += $request->amount;
            $sender_wallet->current_balance -= $request->amount;

            $sender_wallet->save();
            $receiver_wallet->save();

            return redirect()->route('home')->with('success', 'Transfer Successful');
        } else {
            return redirect()->route('home')->with('error', 'Insufficient funds');
        }

        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function show(Transfer $transfer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function edit(Transfer $transfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transfer $transfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transfer $transfer)
    {
        //
    }
}
