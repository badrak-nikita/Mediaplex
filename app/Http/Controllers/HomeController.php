<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Chackout;
use App\Models\Pass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if($usertype == '1')
        {
            $total_users = User::all()->count();
            $total_sold = Chackout::where('payment_status', '=', 'Оплачено')->sum('price');
            $active_orders = Chackout::where('delivery_status', '=', 'В процесi')->count();
            $now = now();
            $lastWeek = now()->subDays(7);
            $week_orders = Chackout::whereBetween('created_at', [$lastWeek, $now])->count();
            return view('admin.home', compact('total_users', 'total_sold', 'active_orders', 'week_orders'));
        }
        else
        {
            return view('home.userpage');
        }
    }

    public function index()
    {
        return view('home.userpage');
    }

    public function products()
    {
        $product = Product::paginate(18);
        $category = Category::all();
        return view('home.products', compact('product', 'category'));
    }

    public function product_category($category_name)
    {
        $product = Product::where('category', $category_name)->paginate(18);
        $category = Category::all();
        return view('home.product_category', compact('product', 'category'));
    }

    public function product_details($id)
    {
        $product = Product::find($id);
        return view('home.product_details', compact('product'));
    }

    public function add_cart($id)
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $product = Product::find($id);
            $cart = new Cart;

            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->product_name=$product->product_name;
            if($product->discount_price != NULL)
            {
                $cart->price=$product->discount_price;
            }
            else
            {
                $cart->price=$product->price;
            }
            $cart->user_id=$user->id;
            $cart->image=$product->image;
            $cart->product_id=$product->id;
            
            $cart->save();
            return redirect()->back()->with('message', 'Товар додано до кошику');
        }
        else
        {
            return view('auth/login');
        }
    }

    public function cart()
    {
        if(Auth::id())
        {
            $id = Auth::user()->id;
            $cart = Cart::where('user_id', '=', $id)->get();
            return view('home.cart', compact('cart'));
        }
        else
        {
            return view('auth/login');
        }
    }

    public function delete_cart($id)
    {
        $data = Cart::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function chackout()
    {
        if(Auth::id())
        {
            $id = Auth::user()->id;
            $user = Auth::user();
            $cart = Cart::where('user_id', '=', $id)->get();
            return view('home.chackout', compact('cart', 'user'));
        }
        else
        {
            return view('auth/login');
        }
    }

    public function order()
    {
        $user = Auth::user();
        $userId = $user->id;
        $category = Category::all();
        $product = Product::paginate(18);
        $data = Cart::where('user_id', '=', $userId)->get();

        foreach($data as $data)
        {
            $chackout = new Chackout;
            $chackout->name=$data->name;
            $chackout->email=$data->email;
            $chackout->phone=$data->phone;
            $chackout->user_id=$data->user_id;
            $chackout->product_name=$data->product_name;
            $chackout->price=$data->price;
            $chackout->image=$data->image;
            $chackout->product_id=$data->product_id;
            $chackout->payment_status='Оплата з погодженням';
            $chackout->delivery_status='В процесi';
            $chackout->save();

            $cart_id=$data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }
        return view('home/products', compact('category', 'product'));
    }

    public function stripe($totalprice)
    {
        return view('home.stripe', compact('totalprice'));
    }

    public function stripePost(Request $request, $totalprice)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "UAH",
                "source" => $request->stripeToken,
                "description" => "Дякуємо за покупку" 
        ]);
              
        $user = Auth::user();
        $userId = $user->id;
        $category = Category::all();
        $product = Product::paginate(18);
        $data = Cart::where('user_id', '=', $userId)->get();

        foreach($data as $data)
        {
            $chackout = new Chackout;
            $chackout->name=$data->name;
            $chackout->email=$data->email;
            $chackout->phone=$data->phone;
            $chackout->user_id=$data->user_id;
            $chackout->product_name=$data->product_name;
            $chackout->price=$data->price;
            $chackout->image=$data->image;
            $chackout->product_id=$data->product_id;
            $chackout->payment_status='Оплачено';
            $chackout->delivery_status='В процесi';
            $chackout->save();

            $cart_id=$data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }

        return back()->with('success', 'Оплата пройшла успiшно');
    }

    public function pass()
    {
        $pass = Pass::all();
        $category = Category::all();
        return view('home.pass', compact('pass', 'category'));
    }

    public function pass_category($category_name)
    {
        $pass = Pass::where('category', $category_name);
        $category = Category::all();
        return view('home.pass_category', compact('pass', 'category'));
    }

    public function pass_details($id)
    {
        $pass = Pass::find($id);
        return view('home.pass_details', compact('pass'));
    }

    public function add_cart_pass($id)
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $pass = Pass::find($id);
            $cart = new Cart;

            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->product_name=$pass->pass_name;
            $cart->price=$pass->price;
            $cart->user_id=$user->id;
            $cart->image=$pass->image;
            $cart->product_id=$pass->id;
            
            $cart->save();
            return redirect()->back()->with('message', 'Товар додано до кошику');
        }
        else
        {
            return view('auth/login');
        }
    }

    public function contacts()
    {
        return view('home.contacts');
    }
}