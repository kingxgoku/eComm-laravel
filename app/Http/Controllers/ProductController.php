<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;

class ProductController extends Controller
{
    function index(){
        $products = Product::all();
        return view('product',['products'=>$products]);
    }

    function details($id){
        $data = Product::find($id);
        return view('detail',['product'=>$data]);
    }

    function search(Request $req){
        $data = Product::where('product-name','like','%'.$req->input('query').'%')->get();
        return view('search',['products'=> $data]);
        // return Product::find('name','like','%'.$req->input('query').'%');
    }

    function addToCart(Request $req){
        
        if($req->session()->has('user')){
            $cart = new Cart;
            $cart->user_id = $req->session()->get('user')['id'];
            $cart->product_id = $req->product_id;
            $cart->save();
            return redirect('/');
        }else
        {
            return redirect('/login');
        }
    }

    static function cartItem(){
        $userid = Session::get('user')['id'];
        return Cart::where('user_id',$userid)->count();
    }
}
