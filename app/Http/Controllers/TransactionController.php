<?php

namespace App\Http\Controllers;

use App\Order;
use App\Transaction;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index(Request $request){
        $role = $request->session()->get('role');
        $name = $request->session()->get('name');
        $idUser = Users::where('fullname', $name)->first(['id_user']);
        $idUser2 = Users::all()->find($idUser)->getAttribute('id_user');
        if($role == "Admin"){
            $order = Order::all();
            $transaction = Transaction::groupBy( 'transaction_done','id_user')
                ->having('transaction_done', '>', 0)
                ->orderBy('id_user')
                ->paginate(1);
            $total = 0;
            return view('transactionadmin', ['transaction' => $transaction],['order' => $order])->with('total',$total);
        }
        else if($role == "User"){
            $order = Order::all()->where('transaction_done','>',0)->whereIn('id_user', $idUser2 );
            $transaction = Transaction::groupBy( 'transaction_done','id_user')
                ->having('transaction_done', '>', 0)
                ->where('id_user',$idUser2)
                ->paginate(1);
            $total = Order::all()->where('transaction_done','>',0)->whereIn('id_user', $idUser2)
                ->sum(function($t){
                return $t->order_quantity * $t->product_price;
            });
            return view('transaction', ['transaction' => $transaction],['order' => $order])->with('total',$total);
        }

    }

    public function transadmin(){
        return view('/transactionadmin');
    }
}
