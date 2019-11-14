<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
   
	   public function index(){
	   	$products = Product::all();
	    return view('welcome',compact('products'));

	   }

	    public function addToCart(Request $request,$id){
	    
	   // $request->session()->forget('cart');
	     
	     $product = Product::find($id);
	     
	     if(!$product){
	     	return redirect()->back()->with('error','Product Not Found');
	     }
	      $cart = session()->get('cart');
	     
	      //////////// Blank /////////
	     
	      if(!$cart){

	      	$cart = [
	      		$id=>[
	      			'name'=>$product->name,
	      			'price' =>$product->price,
	      			'qty' =>1,
	      			'image'=>'/storage/images/'.$product->image,

	      		]
	      	];

	      	$cart = session()->put('cart',$cart);
	      	return redirect()->back()->with('success','Product added to cart successfully!');

	      }

	      //////////// Blank /////////

	      //////////// Not Blank /////////

	      if(isset($cart[$id])){
	      	$cart[$id]['qty']++;
	      	$cart = session()->put('cart',$cart);
	      	return redirect()->back()->with('success','Product added to cart successfully!');

	      }

	      //////////// Not Blank /////////

	      //////////// All Blank /////////

	      $cart[$id] = [
	      	        'name'=>$product->name,
	      			'price' =>$product->price,
	      			'qty' =>1,
	      			'image'=>'/storage/images/'.$product->image,
	      ];

	      //////////// All Blank /////////

	      $cart = session()->put('cart',$cart);
	      return redirect()->back()->with('success','Product added to cart successfully!');

	   }

	   public function showCart(){
	   	  return view('showcart');

	   }


	    public function removeCart(Request $request,$id){

	    	$cart = session()->get('cart');
	    	if(isset($cart[$id])){
	    	 unset($cart[$id]);
	    	 session()->put('cart',$cart);
	       }
         
          return redirect()->back()->with('success','Product removed successfully.');
	   	  //return view('showcart');


	   }


public function updateCart(Request $request){
        if($request->id and $request->quantity){
            $cart = session()->get('cart');
            if(isset($cart[$request->id])){
            $cart[$request->id]["qty"] = $request->quantity;
            session()->put('cart', $cart);
          }
            return redirect()->back()->with('success','Cart updated successfully.');
        }
    }


	   




}
