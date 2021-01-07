<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class sliderController extends Controller
{
	//addslider---------------
    public function addSlider()
    {
    	return view('admin.addslider');
    }

    //Save slider---------------
    public function saveSlider(Request $request)
    {
    	$data = array();
            $data['slider_title'] = $request->slider_title;
            $data['slider_content'] = $request->slider_content;
            $data['slider_status'] = $request->slider_status;
            
            $image = $request->file('slider_image');


            if ( $image ) {
                $image_name = str_random(20);
                $text = strtolower($image->getClientoriginalExtension());
                $image_full_name = $image_name .'.'. $text;
                $upload_path = 'image/';
                $image_url = $upload_path.$image_full_name;
                $success = $image->move($upload_path, $image_full_name);

                if ( $success ) {
                    $data['slider_image'] = $image_url;

                    DB::table('tbl_slider')->insert($data);
                    Session::put('message', 'Slider Added Successfuly!!');
                    return Redirect::to('/addslider');
                }
            }

            DB::table('tbl_slider')->insert($data);
            Session::put('message','Slider Added Successfuly!!');
            return Redirect::to('/addslider');
    }

    //allsliders-------------
    public function allSlider()
    {
    	$all_slider_info = DB::table('tbl_slider')->get();
    	$manage_slider = view('admin.allslider')
    					->with('all_slider_info',$all_slider_info);

    		return view('admin_layout')
    					->with('admin.allslider',$manage_slider);
    }

    // unactive slider========================================

    public function unactiveSlider($slider_id)
    {
    	DB::table('tbl_slider')
    			->where('slider_id',$slider_id)
    			->update(['slider_status' => 0]);

    		return Redirect::to('/allslider');
    }


    // Active slider========================================

    public function activeSlider($slider_id)
    {
    	DB::table('tbl_slider')
    			->where('slider_id',$slider_id)
    			->update(['slider_status' => 1]);

    		return Redirect::to('/allslider');
    }


    //delete Slider============================================
    
    public function deleteslider($slider_id)
    {

    		DB::table('tbl_slider')
    				->where('slider_id',$slider_id)
    				->delete();
    		Session::put('message','Slider Deleted Successfuly!!');
    		return Redirect('/allslider');
    }

}
