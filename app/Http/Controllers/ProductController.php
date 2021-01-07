<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class ProductController extends Controller
{
    public function addProduct()
    {
    	return view('admin.addproduct');
    }

    //save product======================================================

    public function saveProduct(Request $request)
    {
    	$data = array();
            $data['product_name'] = $request->product_name;
            $data['cat_id'] = $request->cat_id;
            $data['menufacture_id'] = $request->menufacture_id;
            $data['product_short_description'] = $request->product_short_description;
            $data['product_long_description'] = $request->product_long_description;
            $data['product_price'] = $request->product_price;
            $data['product_size'] = $request->product_size;
            $data['product_color'] = $request->product_color;
            $data['product_status'] = $request->product_status;
            
            $image = $request->file('product_image');


            if ( $image ) {
                $image_name = str_random(20);
                $text = strtolower($image->getClientoriginalExtension());
                $image_full_name = $image_name .'.'. $text;
                $upload_path = 'image/';
                $image_url = $upload_path.$image_full_name;
                $success = $image->move($upload_path, $image_full_name);

                if ( $success ) {
                    $data['product_image'] = $image_url;

                    DB::table('tbl_product')->insert($data);
                    Session::put('message', 'Product Added Successfuly!!');
                    return Redirect::to('/addproduct');
                }
            }

            DB::table('tbl_product')->insert($data);
            Session::put('message','Product Added Successfuly!!');
            return Redirect::to('/addproduct');
    }


    //all product===============================================

    public function allProduct()
    {
        $all_roduct_info = DB::table('tbl_product')
                        ->join('tbl_category','tbl_product.cat_id','=','tbl_category.cat_id')
                        ->join('tbl_menufacture','tbl_product.menufacture_id','=','tbl_menufacture.menufacture_id')
                        ->select('tbl_product.*','tbl_category.cat_name','tbl_menufacture.menufacture_name')
                        ->get();
        $manage_product = view('admin.allproduct')
                        ->with('all_roduct_info',$all_roduct_info);

            return view('admin_layout')
                        ->with('admin.allproduct',$manage_product);
    }


    //unactive product===============================================

    public function unactiveProduct($product_id)
    {
        DB::table('tbl_product')
                ->where('product_id',$product_id)
                ->update(['product_status' => 0]);

            return Redirect::to('/allproduct');
    }

    //active product================================

    public function activeProduct($product_id)
    {
        DB::table('tbl_product')
                ->where('product_id',$product_id)
                ->update(['product_status' => 1]);

            return Redirect::to('/allproduct');
    }


    //edit product=================================

    public function EditProduct($product_id)
    {
        $edit_product_info = DB::table('tbl_product')
                            ->join('tbl_category','tbl_product.cat_id','=','tbl_category.cat_id')
                            ->join('tbl_menufacture','tbl_product.menufacture_id','=','tbl_menufacture.menufacture_id')
                            ->select('tbl_product.*','tbl_category.cat_name','tbl_menufacture.menufacture_name')
                            ->where('product_id', $product_id)
                            ->first();
        $manage_product = view('admin.editproduct')
                        ->with('edit_product_info',$edit_product_info);

            return view('admin_layout')
                        ->with('admin.editproduct',$manage_product);
    }


    //update product===========================================

    public function updateProduct(Request $request, $product_id)
    {
        $data = array();
            $data['product_name'] = $request->product_name;
            $data['cat_id'] = $request->cat_id;
            $data['menufacture_id'] = $request->menufacture_id;
            $data['product_short_description'] = $request->product_short_description;
            $data['product_long_description'] = $request->product_long_description;
            $data['product_price'] = $request->product_price;
            $data['product_size'] = $request->product_size;
            $data['product_color'] = $request->product_color;
            $data['product_status'] = $request->product_status;
            
            $image = $request->file('product_image');


            if ( $image ) {
                $image_name = str_random(20);
                $text = strtolower($image->getClientoriginalExtension());
                $image_full_name = $image_name .'.'. $text;
                $upload_path = 'image/';
                $image_url = $upload_path.$image_full_name;
                $success = $image->move($upload_path, $image_full_name);

                if ( $success ) {
                    $data['product_image'] = $image_url;

                    DB::table('tbl_product')
                            ->where('product_id', $product_id)
                            ->update($data);
                    Session::put('message', 'Product Update Successfuly!!');
                    return Redirect::to('/allproduct');
                }
            }
            

            DB::table('tbl_product')
                    ->where('product_id', $product_id)
                    ->update($data);

            Session::put('message','Product Update Successfuly!!');
            return Redirect::to('/allproduct');
    }


    //delete product========================================

    public function DeleteProduct($product_id)
    {

            DB::table('tbl_product')
                    ->where('product_id',$product_id)
                    ->delete();
            Session::put('message','Product Deleted Successfuly!!');
            return Redirect('/allproduct');
    }



}
