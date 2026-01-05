@extends('master')

@section('title', 'Transaction')
@section('content')
    <div id="container_transactionadmin">
        <div class="tengah">
            @foreach($transaction as $t)
                <?php $total = 0; ?>
                <div class="mb-8 p-6 bg-white rounded-xl shadow-lg dark:bg-gray-800">
                    <div class="mb-4">
                        <span class="block text-lg font-bold text-blue-700 dark:text-blue-300">Transaction Date: {{$t->created_at}}</span>
                        <span class="block text-sm text-gray-700 dark:text-gray-200">Transaction Number: {{$t->transaction_done}}</span>
                        <span class="block text-sm text-gray-700 dark:text-gray-200">Buyer Name: {{$t->users->fullname}}</span>
                    </div>
                    <div class="overflow-x-auto rounded-lg shadow">
                        <table class="min-w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs uppercase bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                                <tr>
                                    <th class="px-4 py-3">Figure Picture</th>
                                    <th class="px-4 py-3">Figure Name</th>
                                    <th class="px-4 py-3">Quantity</th>
                                    <th class="px-4 py-3">Price</th>
                                    <th class="px-4 py-3">Total</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800">
                                @foreach($order as $o)
                                    @if($o->transaction_done == $t->transaction_done and $o->id_user == $t->id_user)
                                        <?php $total += $o->product_price * $o->order_quantity; ?>
                                        <tr class="border-b dark:border-gray-700">
                                            <td class="px-4 py-3"><img src="storage/{{$o->product_image}}" alt="Tidak memuat" class="w-16 h-16 object-cover rounded border border-gray-300"></td>
                                            <td class="px-4 py-3">{{$o->product_name}}</td>
                                            <td class="px-4 py-3">{{$o->order_quantity}}</td>
                                            <td class="px-4 py-3">Rp. {{$o->product_price}}</td>
                                            <td class="px-4 py-3 font-bold text-green-600">Rp. {{$o->product_price * $o->order_quantity}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                            <tfoot class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th colspan="4" class="px-4 py-3 text-right">Total</th>
                                    <th class="px-4 py-3 font-bold text-green-600">Rp. {{$total}}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="pagination">
            {{ $transaction->links() }}
        </div>
    </div>
@endsection