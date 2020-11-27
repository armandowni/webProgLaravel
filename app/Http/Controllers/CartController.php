<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\Transaction;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function cart(Request $request){
        $name = $request->session()->get('name');
        $id = Users::where('fullname', $name)->first(['id_user']);
        $id2 = Users::all()->find($id)->getAttribute('id_user');
        $cart = Cart::all()->where('id_user', $id2);

        $total = Cart::all()->where('id_user', $id2)->sum(function($t){
            return $t->cart_quantity * $t->products->product_price;
        });

        return view('cart', ['cart' => $cart],['total' => $total]);
    }

    public function inputCart(Request $request){
        if($request->has('searchBtn')){
            return redirect()->action('ProductController@index',['search'=>$request->input('search')]);
        }
        if($request->has('id_value')){
            $name = $request->session()->get('name');
            $id = Users::where('fullname', $name)->first(['id_user']);
            $id2 = Users::all()->find($id)->getAttribute('id_user');
            $input = Cart::where([['id_user',$id2],['id_product', $request->input('id_value')]])->first(['id_cart']);
            if($input != null){
                $cart = DB::table('cart')->where([['id_user',$id2],['id_product', $request->input('id_value')]])
                    ->update(['cart_quantity'
                    => DB::raw('cart_quantity+1')]);
            }
            else{
                $cart = new Cart();
                $cart->id_user = $id2;
                $cart->id_product = $request->input('id_value');
                $cart->cart_quantity += 1;

                $cart->save();
            }
        }
        return redirect()->action('ProductController@index');
    }

    public function updateCart(Request $request){
        if($request->has('removeBtn')){
            DB::table('cart')->where('id_cart','=',$request->input('removeBtn'))->delete();
            return redirect()->action('CartController@cart');
        }
        if($request->has('checkoutBtn')){
            $name = $request->session()->get('name');
            $id = Users::where('fullname', $name)->first(['id_user']);
            $id2 = Users::all()->find($id)->getAttribute('id_user');
            $cart = Cart::all()->where('id_user', $id2);

            $trans = DB::table('users')->where('id_user',$id2)
                ->update(['transaction_done'
                => DB::raw('transaction_done+1')]);

            foreach ($cart as $c){
                $order = new Order();
                $order->id_user = $id2;
                $order->order_quantity = $c->cart_quantity;
                $order->transaction_done = $c->users->transaction_done;
                $order->product_name = $c->products->product_name;
                $order->product_price = $c->products->product_price;
                $order->product_image = $c->products->product_image;

                $order->save();
            }

            $transactionDone = Users::all()->find($id)->getAttribute('transaction_done');
            $orderProduct = Order::all()->where('id_user', $id2)->whereIn('transaction_done', $transactionDone);
            foreach ($orderProduct as $op){
                $transaction = new Transaction();
                $transaction->id_order = $op->id_order;
                $transaction->id_user = $id2;
                $transaction->transaction_done = $transactionDone;

                $transaction->save();
            }

            foreach ($cart as $c2){
                $qty = DB::table('products')->where('id_product',$c2->id_product)
                    ->decrement('product_quantity', $c2->cart_quantity);
            }

            DB::table('cart')->where('id_user', $id2)->delete();
            return redirect()->action('ProductController@index');
        }
    }
}


