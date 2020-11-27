@extends('master')

@section('title', 'Transaction')
@section('content')
    <div id="container_transactionadmin">
        <div class="tengah">
            @foreach($transaction as $t)
            <div id="atas">
                <span>Transaction Date: {{$t->created_at}}</span><br>
                <span>Transaction Number: {{$t->transaction_done}}</span><br>
                <span>Buyer Name: {{$t->users->fullname}}</span><br>
            </div>
            <table id="tabletransactionadmin" style="width: 97%; height: 350px;overflow: auto;display: block;">
                <tr>
                    <th>Figure Picture</th>
                    <th>Figure Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
                @foreach($order as $o)
                    @if($o->transaction_done == $t->transaction_done)
                <tr>
                    <th>
                        <img src="storage/{{$o->product_image}}" alt="Tidak memuat" style="border: 1px solid black;" width="100px" height="100px">
                    </th>
                    <th><span>{{$o->product_name}}"</span></th>
                    <th><span>{{$o->order_quantity}}</span></th>
                    <th><span>Rp. {{$o->product_price}}</span></th>
                    <th><span>Rp. {{$o->product_price * $o->order_quantity}}"</span></th>
                </tr>
                    @else @continue;
                    @endif
                @endforeach
                <tr>
                    <th>
                        <span>Total</span>
                    </th>
                    <th>
                        <span>Rp. {{$total}}</span>
                    </th>
                </tr>
            </table>
        @endforeach
        </div>
        <div class="pagination">
            {{ $transaction->links() }}
        </div>
    </div>
@endsection