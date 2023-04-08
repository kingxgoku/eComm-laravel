<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    function cartList(){
        $userid = Session::get('user')['id'];
        $data = DB::table('cart')->join('products','cart.product_id','products.id')->select('products.*','cart.id as cart_id')->where('cart.user_id',$userid)->get();
        return view('cart',['products'=>$data]);
    }

    function removeCart($id){
        Cart::destroy($id);
        return redirect('/cart-list');
    }
}
