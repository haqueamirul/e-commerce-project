<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
Session_start();

class MenufactureController extends Controller
{


    public function AddMenufacture()
    {
    	return view('admin.addmenufacture');
    }


    //save menufacture
    public function saveMenufacture(Request $request)
    {
    	$data = array();
    		$data['menufacture_id'] = $request->menufacture_id;
    		$data['menufacture_name'] = $request->menufacture_name;
    		$data['menufacture_description'] = $request->menufacture_description;
    		$data['menufacture_status'] = $request->menufacture_status;

    		DB::table('tbl_menufacture')->insert($data);
    		Session::put('message','Brand Added Successfuly!!');
    		return Redirect('/add_menufacture');
    }

    public function allMenufacture()
    {
    	$all_menufacture_info = DB::table('tbl_menufacture')->get();
    	$manage_category = view('admin.allmenufacture')
    					->with('all_menufacture_info',$all_menufacture_info);

    		return view('admin_layout')
    					->with('admin.allmenufacture',$manage_category);
    }


    public function unactiveMenufacture($menufacture_id)
    {
    	DB::table('tbl_menufacture')
    			->where('menufacture_id',$menufacture_id)
    			->update(['menufacture_status' => 0]);

    		return Redirect::to('/all_menufacture');
    }

    public function activeMenufacture($menufacture_id)
    {
    	DB::table('tbl_menufacture')
    			->where('menufacture_id',$menufacture_id)
    			->update(['menufacture_status' => 1]);

    		return Redirect::to('/all_menufacture');
    }

    //edit menufacture
    public function editMenufacture($menufacture_id)
    {
    	$edit_brand_info = DB::table('tbl_menufacture')
    						->where('menufacture_id', $menufacture_id)
    						->first();
    	$manage_category = view('admin.editmenufacture')
    					->with('edit_brand_info',$edit_brand_info);

    		return view('admin_layout')
    					->with('admin.editmenufacture',$manage_category);
    }

    //update menufacture

    public function updateMenufacture(Request $request, $menufacture_id)
    {
    	$data = array();
    		$data['menufacture_name'] = $request->menufacture_name;
    		$data['menufacture_description'] = $request->menufacture_description;

    		DB::table('tbl_menufacture')
    				->where('menufacture_id',$menufacture_id)
    				->update($data);
    		Session::put('message','Menufacture Updated Successfuly!!');
    		return Redirect('/all_menufacture');
    }


    //delete menufacture
    public function deleteMenufacture($menufacture_id)
    {

    		DB::table('tbl_menufacture')
    				->where('menufacture_id',$menufacture_id)
    				->delete();
    		Session::put('message','Brand Deleted Successfuly!!');
    		return Redirect('/all_menufacture');
    }
}
