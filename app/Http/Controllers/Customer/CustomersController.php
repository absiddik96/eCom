<?php

namespace App\Http\Controllers\Customer;

use Auth;
use Session;
use Illuminate\Http\Request;
use App\Models\Customer\Customer;
use App\Http\Controllers\Controller;

class CustomersController extends Controller
{
	public function reg_form()
	{
		return view('frontend.customer.reg');
	}

    public function registration(Request $request)
    {
    	$this->validate($request,[
    		'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:6|max:50|confirmed',
    	]);

    	Customer::create([
    		'customer_id' => Customer::generateCustomerId(),
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
    	]);

    	return redirect()->back();
    }

    public function login(Request $request)
    {
    	$this->validate($request,[
            'email' => 'required|string|email',
            'password' => 'required|string|min:6|max:50',
    	]);

    	if (Auth::guard('customer')->attempt(['email'=>$request->email,'password' => $request->password],$request->remember)) {
    		return redirect()->intended(route('customer.account'));
    	}
        Session::flash('warning', 'you are not valid');
    	return redirect()->back();
    }

    public function account()
    {
    	return view('frontend.customer.account');
    }
}
