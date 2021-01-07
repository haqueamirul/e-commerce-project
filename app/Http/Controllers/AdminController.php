<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
Session_start();

class AdminController extends Controller
{	
	//For admin login---------------------
    public function adminLogin()
    {
    	return view('admin_login');
    }


    

    public function adminDash(Request $request)
    {


    		$email = $request->admin_email;
	    	$password = md5($request->admin_password);
	    	$result = DB::table('tbl_admin')
	    	->where('admin_email', $email)
	    	->where('admin_password', $password)
	    	->first();

	    	if ( $result ) {
	    		Session::put('admin_email', $result->admin_email);
	    		Session::put('admin_id', $result->admin_id);

	    		return Redirect::to('/dashboard');
	    	}
	    	else{
	    		Session::put('message','Email or Password Invelid');

	    		return Redirect::to('/admin');
	    	}

    }

    
}
