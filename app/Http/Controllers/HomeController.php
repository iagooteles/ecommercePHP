<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Product;

use App\Models\Cart;

class HomeController extends Controller
{
    public function index() {
        $products = product::paginate(3); // aumentar paginação depois conforme necessidade 

        return view('home.userpage', compact('products'));
    }

    public function redirect() {
        $usertype = Auth::user()->usertype;
        
        if ($usertype == '1') {
            return view('admin.home');
        } else {
            $products = product::paginate(3); // aumentar paginação depois conforme necessidade 
            return view('home.userpage', compact('products'));
        }
    }

    public function product_details($id) {
        $product = product::find($id);

        return view('home.product_details', compact('product'));
    }

    public function add_to_cart(Request $request, $id) {
        if (Auth::id()) {
            $user = Auth::user();
            $product = product::find($id);
            
            $cart = new cart;
            $cart->user_name = $user->name;
            $cart->user_email = $user->email;
            $cart->user_phone = $user->phone;
            $cart->user_address = $user->address;
            $cart->user_id = $user->id;
            $cart->product_title = $product->title;
            $cart->product_quantity = $request->quantity;

            if ($product->discount_price ) {
                $cart->product_price = $product->discount_price * $request->quantity;
            } else {
                $cart->product_price = $product->price * $request->quantity;
            }

            $cart->product_image = $product->image;
            $cart->product_id = $product->id;

            $cart->save();

            return redirect()->back();
        }

        return redirect('login');
    }
}
