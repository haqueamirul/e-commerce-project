<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class HomeController extends Controller
{
    public function index()
    {
    	$all_published_product = DB::table('tbl_product')
                        ->join('tbl_category','tbl_product.cat_id','=','tbl_category.cat_id')
                        ->join('tbl_menufacture','tbl_product.menufacture_id','=','tbl_menufacture.menufacture_id')
                        ->select('tbl_product.*','tbl_category.cat_name','tbl_menufacture.menufacture_name')
                        ->where('cat_status', 1)
                        ->limit(6)
                        ->get();
        $manage_product = view('pages.home_content')
                        ->with('all_published_product',$all_published_product);

            return view('layout')
                        ->with('pages.home_content',$manage_product);
    }

    //show product by category
    public function show_product_by_category($cat_id)
    {
        $show_product_by_cat = DB::table('tbl_product')
                        ->join('tbl_category','tbl_product.cat_id','=','tbl_category.cat_id')
                        ->join('tbl_menufacture','tbl_product.menufacture_id','=','tbl_menufacture.menufacture_id')
                        ->select('tbl_product.*','tbl_category.cat_name','tbl_menufacture.menufacture_name')
                        ->where('tbl_category.cat_id',$cat_id)
                        ->where('cat_status', 1)
                        ->limit(12)
                        ->get();
        $manage_product = view('pages.product_by_category')
                        ->with('show_product_by_cat',$show_product_by_cat);

            return view('layout')
                        ->with('pages.product_by_category',$manage_product);
    }

    //show product by menufacture
    public function show_product_by_menufacture($menufacture_id)
    {
        $product_by_menufactures = DB::table('tbl_product')
                        ->join('tbl_category','tbl_product.cat_id','=','tbl_category.cat_id')
                        ->join('tbl_menufacture','tbl_product.menufacture_id','=','tbl_menufacture.menufacture_id')
                        ->select('tbl_product.*','tbl_category.cat_name','tbl_menufacture.menufacture_name')
                        ->where('tbl_menufacture.menufacture_id',$menufacture_id)
                        ->where('menufacture_status', 1)
                        ->limit(12)
                        ->get();
        $manage_menufacture = view('pages.product_by_menufacture')
                        ->with('product_by_menufactures',$product_by_menufactures);

            return view('layout')
                        ->with('pages.product_by_menufacture',$manage_menufacture);
    }

    //view product details
    public function productDetails($product_id)
    {
        $product_by_details = DB::table('tbl_product')
                        ->join('tbl_category','tbl_product.cat_id','=','tbl_category.cat_id')
                        ->join('tbl_menufacture','tbl_product.menufacture_id','=','tbl_menufacture.menufacture_id')
                        ->select('tbl_product.*','tbl_category.cat_name','tbl_menufacture.menufacture_name')
                        ->where('tbl_product.product_id',$product_id)
                        ->where('product_status', 1)
                        ->first();
        $manage_details = view('pages.viewproducts')
                        ->with('product_by_details',$product_by_details);

            return view('layout')
                        ->with('pages.viewproducts',$manage_details);
    }
}
