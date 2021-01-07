<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
Session_start();

class CategoryController extends Controller
{
    public function addCategory()
    {
    	return view('admin.addcategory');
    }

    //all category============================================

    public function allCategory()
    {
    	$all_category_info = DB::table('tbl_category')->get();
    	$manage_category = view('admin.allcategory')
    					->with('all_category_info',$all_category_info);

    		return view('admin_layout')
    					->with('admin.allcategory',$manage_category);
    }

    //save category====================================================

    public function saveCategory(Request $request)
    {
    	$data = array();
    		$data['cat_id'] = $request->cat_id;
    		$data['cat_name'] = $request->cat_name;
    		$data['cat_description'] = $request->cat_description;
    		$data['cat_status'] = $request->cat_status;

    		DB::table('tbl_category')->insert($data);
    		Session::put('message','Category Added Successfuly!!');
    		return Redirect('/add_catrgory');
    }

    // unactive category========================================

    public function unactiveCategory($cat_id)
    {
    	DB::table('tbl_category')
    			->where('cat_id',$cat_id)
    			->update(['cat_status' => 0]);

    		return Redirect::to('/all_catrgory');
    }

    //active category================================

    public function activeCategory($cat_id)
    {
    	DB::table('tbl_category')
    			->where('cat_id',$cat_id)
    			->update(['cat_status' => 1]);

    		return Redirect::to('/all_catrgory');
    }

    //edit category=================================

    public function editCategory($cat_id)
    {
    	$edit_category_info = DB::table('tbl_category')
    						->where('cat_id', $cat_id)
    						->first();
    	$manage_category = view('admin.editCatergory')
    					->with('edit_category_info',$edit_category_info);

    		return view('admin_layout')
    					->with('admin.editCatergory',$manage_category);
    }


    //update category===========================================

    public function updateCategory(Request $request, $cat_id)
    {
    	$data = array();
    		$data['cat_name'] = $request->cat_name;
    		$data['cat_description'] = $request->cat_description;

    		DB::table('tbl_category')
    				->where('cat_id',$cat_id)
    				->update($data);
    		Session::put('message','Category Updated Successfuly!!');
    		return Redirect('/all_catrgory');
    }


    //delete category============================================
    
    public function deleteCategory($cat_id)
    {

    		DB::table('tbl_category')
    				->where('cat_id',$cat_id)
    				->delete();
    		Session::put('message','Category Deleted Successfuly!!');
    		return Redirect('/all_catrgory');
    }


}
