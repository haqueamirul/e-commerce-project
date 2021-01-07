<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Illuminate\Support\Facades\Redirect;

class cartController extends Controller
{
    public function addTocart(Request $request)
    {
    	$qty =$request->qty;
    	$product_id = $request->product_id;
    	$addto_cart_info = DB::table('tbl_product')
    					 ->where('product_id', $product_id)
    					 ->first();

    	$data['id'] = $addto_cart_info->product_id;
    	$data['name'] = $addto_cart_info->product_name;
    	$data['price'] = $addto_cart_info->product_price;
    	$data['quantity'] = $qty;
    	$data['attributes']['image'] = $addto_cart_info->product_image;

    	Cart::add($data);
    	return Redirect::to('/show-cart');

    }

    public function showCart()
    {
    	$category_for_cart = DB::table('tbl_category')
                        ->where('cat_status', 1)
                        ->get();
        $manage_catagory = view('pages.add_to_cart')
                        ->with('category_for_cart',$category_for_cart);

            return view('layout')
                        ->with('pages.add_to_cart',$manage_catagory);
    }

    
}
