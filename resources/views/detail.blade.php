@extends('master')

@section('title', 'Detail')
@section('content')
<div class="flex flex-col md:flex-row gap-8 items-start justify-center p-6 bg-white rounded-xl shadow-lg dark:bg-gray-800">
    <img class="w-64 h-64 object-cover rounded-lg border border-gray-300" src="../storage/{{$detail->product_image}}" alt="Tidak bisa memuat">
    <div class="flex-1">
        <div class="mb-4">
            <span class="block text-xl font-bold text-gray-900 dark:text-white mb-2">Figure Description</span>
            <p class="text-gray-700 dark:text-gray-300">{{$detail->product_desc}}</p>
        </div>
        <div>
            <span class="block text-lg font-semibold text-blue-700 dark:text-blue-300 mb-1">Figure Detail</span>
            <ul class="list-disc pl-5 text-gray-800 dark:text-gray-200">
                <li>Category: {{$detail->product_category}}</li>
                <li>Quantity: {{$detail->product_quantity}}</li>
                <li>Price: <span class="font-bold text-green-600">Rp{{$detail->product_price}}</span></li>
            </ul>
        </div>
    </div>
</div>
@endsection