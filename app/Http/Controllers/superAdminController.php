<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
Session_start();

class superAdminController extends Controller
{
    
	//For admin dashboard-----------------
    public function adminDashboard()
    {
    	$this->adminAuthcheck();
    	return view('admin.dashboard');
    }

    //logout ======================

    public function Logout()
    {
    	
    	Session::flush();
    	return Redirect::to('/admin');
    }

    public function adminAuthcheck()
    {
    	$admin_id = Session::get('admin_id');
    	if ($admin_id) {
    		return;
    	}else{
    		return Redirect::to('/admin')->send();
    	}
    }
}
