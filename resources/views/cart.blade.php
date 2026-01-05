@extends('master')

@section('title', 'cart')
@section('content')
<div class="flex justify-center items-center">
    <div class="w-full max-w-4xl p-8 space-y-6 bg-white rounded-xl shadow-lg dark:bg-gray-800">
        <span class="text-2xl font-bold text-blue-700 dark:text-white mb-4 block">Your Cart</span>
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="min-w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs uppercase bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                    <tr>
                        <th class="px-6 py-3">Product</th>
                        <th class="px-6 py-3">Quantity</th>
                        <th class="px-6 py-3">Price</th>
                        <th class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800">
                    @foreach($cart as $p)
                    <tr class="border-b dark:border-gray-700">
                        <td class="px-6 py-4 flex items-center gap-3">
                            <img src="../storage/{{$p->products->product_image}}" alt="Tidak memuat" class="w-16 h-16 object-cover rounded border border-gray-300">
                            <span class="font-semibold text-gray-900 dark:text-white">{{$p->products->product_name}}</span>
                        </td>
                        <td class="px-6 py-4">
                            <input type="number" disabled value="{{$p->cart_quantity}}" class="w-16 bg-gray-100 border border-gray-300 rounded text-center dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-bold text-green-600">Rp. {{$p->products->product_price}}</span>
                        </td>
                        <td class="px-6 py-4">
                            <form action="/cart" method="post" class="inline">
                                @csrf
                                <button type="submit" name="removeBtn" value="{{$p->id_cart}}" class="flex items-center gap-2 px-3 py-2 text-white bg-red-600 hover:bg-red-700 rounded-lg font-medium focus:ring-2 focus:ring-red-300 focus:outline-none transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2"/></svg>
                                    Remove
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-right" colspan="2">Total Price</th>
                        <th class="px-6 py-3 font-bold text-green-600">Rp. {{$total}}</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td colspan="4" class="px-6 py-3 text-right">
                            <form action="/cart" method="post" class="inline">
                                @csrf
                                <button id="btn_checkout" name="checkoutBtn" type="submit" class="flex items-center gap-2 px-5 py-2.5 text-white bg-blue-700 hover:bg-blue-800 rounded-lg font-medium focus:ring-2 focus:ring-blue-300 focus:outline-none transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                                    Checkout
                                </button>
                            </form>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>


@endsection
