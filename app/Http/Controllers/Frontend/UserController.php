<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        // dd($orders);


        return view('frontend.orders.index', compact('orders'));
    }

    public function view($id)
    {
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        // dd($orders);


        // // // my orders
        $old_cartitems = Cart::where('user_id', Auth::id())->get();
        foreach ($old_cartitems as $item) {
            if (!Product::where('id', $item->prod_id)->where('qty', '>=', $item->prod_qty)->exists()) {
                $removeItem = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeItem->delete();
            }
        }

        // $cartitems = Cart::where('user_id', Auth::id())->get();
        $cartitems = Cart::all()->where('user_id', Auth::id());
        // dd($cartitems);
        // // // my orders
        // ------------------------------------------------------------------------------------------------
        return view('frontend.orders.view', compact('orders', 'cartitems'));
    }
}


// <?php

// namespace App\Http\Controllers\Frontend;

// use App\Http\Controllers\Controller;
// use App\Models\Order;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class UserController extends Controller
// {
//     //
//     public function index()
//     {
//         $orders = Order::where('user_id', Auth::id())->get();
//         // dd($orders);

//         // my orders

//         // my orders
//         return view('frontend.orders.index', compact('orders'));
//     }

//     public function view($id)
//     {
//         $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
//         return view('frontend.orders.view', compact('orders'));
//     }
// }
