<?php

namespace App\Http\Controllers\Admin\Bank\EWallet;

use Session;
use Illuminate\Http\Request;
use App\Models\Bank\EWallet;
use App\Http\Controllers\Admin\AdminBaseController;

class EWalletsController extends AdminBaseController
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $eWallets = EWallet::all();
        return view('admin.bank.eWallet.index',compact('eWallets'));
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
        $this->validate($request,[
            'name' => 'required|min:2|max:100|unique:e_wallets',
        ],[
            'name.required'=>'The E-Wallet Name / Type field is required.'
        ]);

        if(EWallet::create($request->all())){
            Session::flash('success','E-Wallet create successfull.');
        }

        return redirect()->back();
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
        return view('admin.bank.eWallet.edit')
        ->with('eWallet',EWallet::find($id));
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
        $eWallet = EWallet::find($id);

        $this->validate($request,[
            'name' => 'required|min:2|max:100|unique:e_wallets,name,'.$eWallet->id,
        ],[
            'name.required'=>'E-Wallet Name / Type field is required.'
        ]);

        if($eWallet->update($request->all())){
            Session::flash('success','E-Wallet update successfull.');
        }

        return redirect()->route('e-wallet.index');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $eWallet = EWallet::find($id);

        if($eWallet->delete()){
            Session::flash('success','E-Wallet delete successfull.');
        }

        return redirect()->route('e-wallet.index');
    }

}
