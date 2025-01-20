<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Comment;

// stripe
use Illuminate\Support\Facades\Session;

// use Session;
use Stripe;

class HomeController extends Controller
{
    public function index() {
        $products = product::paginate(3); // aumentar paginação depois conforme necessidade 
        $comments = comment::all();

        return view('home.userpage', compact('products', 'comments'));
    }

    public function redirect() {
        $usertype = Auth::user()->usertype;
        
        if ($usertype == '1') {
            $total_products = product::all()->count();
            $total_orders = order::all()->count();
            $total_users = user::all()->count();
            $order = order::all();
            $total_revenue = 0;

            foreach($order as $order) {
                $total_revenue = $total_revenue + $order->product_price;
            }

            $total_delivered = order::where('delivery_status', '=', 'OK')->count();
            $total_not_delivered = order::where('delivery_status', '=', 'processando')->count();

            return view('admin.home', compact('total_products', 'total_orders', 'total_users', 'total_revenue', 'total_delivered', 'total_not_delivered'));
        } else {
            $products = product::paginate(3); // aumentar paginação depois conforme necessidade 
            $comments = comment::all();

            return view('home.userpage', compact('products', 'comments'));
        }
    }

    public function product_details($id) {
        $product = product::find($id);

        return view('home.product_details', compact('product'));
    }

    public function show_cart() {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $cart = cart::where('user_id', '=', $id)->get();
    
            return view('home.show_cart', compact('cart'));
        }

        return redirect('login');
    }

    public function show_order() {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $order = order::where('user_id', '=', $id)->get();
    
            return view('home.order', compact('order'));
        }

        return redirect('login');
    }

    public function cancel_order($id) {
        $order = order::find($id);
        $order->delivery_status = 'Cancelado';
        $order->save();

        return redirect()->back()->with('msg', 'Pedido cancelado com sucesso!');
    }

    public function add_to_cart(Request $request, $id) {
        if (Auth::id()) {
            $user = Auth::user();
            $userId = $user->id;
            $product = product::find($id);

            $product_exists_id = cart::where('product_id', '=', $id)
            ->where('user_id', '=', $userId)
            ->get('id')
            ->first();
            
            $cart = new cart;
            $cart->user_name = $user->name;
            $cart->user_email = $user->email;
            $cart->user_phone = $user->phone;
            $cart->user_address = $user->address;
            $cart->user_id = $user->id;
            $cart->product_title = $product->title;
            
            if ($product_exists_id) {
                $cart = cart::find($product_exists_id)->first();
                $quantity = $cart->product_quantity;

                $cart->product_quantity = $quantity + $request->quantity;
            } else {
                $cart->product_quantity = $request->quantity;
            }

            if ($product->discount_price ) {
                $cart->product_price = $product->discount_price * $cart->product_quantity;
            } else {
                $cart->product_price = $product->price * $cart->product_quantity;
            }

            $cart->product_image = $product->image;
            $cart->product_id = $product->id;

            $cart->save();

            return redirect('show_cart')->with('msg', 'Produto adicionado ao carrinho com sucesso!');
        }

        return redirect('login');
    }

    public function remove_cart($id) {
        $cart = cart::find($id);
        $cart->delete();

        return redirect()->back()->with('msg', 'Deletado com sucesso!');
    }

    public function cash_order() {
        $user = Auth::user();
        $userID = $user->id;

        $data = cart::where('user_id', '=', $userID)->get();

        foreach($data as $data) {
            $order = new order();

            $order->name = $data->user_name;
            $order->email = $data->user_email;
            $order->phone = $data->user_phone;
            $order->address = $data->user_address;
            $order->user_id = $data->user_id;
            
            $order->product_title = $data->product_title;
            $order->product_quantity = $data->product_quantity;
            $order->product_price = $data->product_price;
            $order->product_image = $data->product_image;
            $order->product_id = $data->product_id;

            $order->payment_status = 'cash';
            $order->delivery_status = 'processando';
            
            $order->save();

            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();
        }

        return redirect()->back()->with('msg', 'Recebemos sua ordem, entraremos em contato em breve!');
    }

    public function card_order($totalPrice) {
        return view('home.stripe', compact('totalPrice'));
    }

    public function stripePost(Request $request, $totalPrice) {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => $totalPrice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Obrigado por comprar." 
        ]);

        $user = Auth::user();
        $userID = $user->id;

        $data = cart::where('user_id', '=', $userID)->get();

        foreach($data as $data) {
            $order = new order();

            $order->name = $data->user_name;
            $order->email = $data->user_email;
            $order->phone = $data->user_phone;
            $order->address = $data->user_address;
            $order->user_id = $data->user_id;
            
            $order->product_title = $data->product_title;
            $order->product_quantity = $data->product_quantity;
            $order->product_price = $data->product_price;
            $order->product_image = $data->product_image;
            $order->product_id = $data->product_id;

            $order->payment_status = 'Finalizado';
            $order->delivery_status = 'processando';
            
            $order->save();

            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();
        }

        Session::flash('success', 'Pagamento bem sucedido!');

        return back();
    }

    public function add_comment(Request $request) {
        if (Auth::id()) {
            $comment = new comment;
            $comment->name = Auth::user()->name;
            $comment->user_id = Auth::user()->id;
            $comment->comment = $request->comment;
            $comment->save();

            return redirect()->back();
        }
        
        return redirect('login');
    }

    public function product_search(Request $request) {
        $comments = comment::all();
        $searchText = $request->search;

        $products = product::where('title', 'LIKE', "%$searchText%")
        ->orWhere('category', 'LIKE', "%$searchText%")
        ->orWhere('description', 'LIKE', "%$searchText%")
        ->paginate(3); // Mudar conforme o necessário

        return view('home.userpage', compact('products', 'comments'));
    }

    public function search_product_view(Request $request) {
        $searchText = $request->search;

        $products = product::where('title', 'LIKE', "%$searchText%")
        ->orWhere('category', 'LIKE', "%$searchText%")
        ->orWhere('description', 'LIKE', "%$searchText%")
        ->paginate(3); // Mudar conforme o necessário

        return view('home.all_products', compact('products'));
    }

    public function all_products() {
        $products = product::paginate(9); // aumentar paginação depois conforme necessidade 

        return view('home.all_products', compact('products'));
    }
}
