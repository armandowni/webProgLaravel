@extends('master')

@section('title', 'Update Figure')
@section('content')
<div class="flex justify-center items-center">
    <div class="w-full max-w-lg p-8 space-y-6 bg-white rounded-xl shadow-lg dark:bg-gray-800">
        <div class="flex flex-col items-center">
            <span class="text-2xl font-bold text-blue-700 dark:text-white mb-2">Update Figure</span>
        </div>
        @if ($errors->any())
            <div class="mb-4 p-3 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/insert" method="post" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label for="figurename" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Figure Name</label>
                <input type="text" name="figurename" id="figurename" placeholder="Figure Name" value="{{$update->product_name}}" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div>
                <label for="description" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Description</label>
                <textarea name="description" id="description" rows="4" placeholder="Description" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$update->product_desc}}</textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="quantity" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Quantity</label>
                    <input type="number" name="quantity" id="quantity" placeholder="Quantity" value="{{$update->product_quantity}}" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Price</label>
                    <input type="number" name="price" id="price" placeholder="Price" value="{{$update->product_price}}" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
            <div>
                <label for="category" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Category</label>
                <select name="category" id="category" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="{{$update->categories->id_category}}">{{$update->categories->category_name}}</option>
                    @foreach($category as $c)
                        @if($update->categories->category_name == $c->category_name)
                            @continue
                        @endif
                        <option value="{{$c->id_category}}">{{$c->category_name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="figurepic" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Figure Picture</label>
                <input type="file" name="figurepic" id="figurepic" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
            </div>
            <button type="submit" name="updateBtn" value="{{$update->id_product}}" class="flex items-center gap-2 px-5 py-2.5 text-white bg-blue-700 hover:bg-blue-800 rounded-lg font-medium focus:ring-2 focus:ring-blue-300 focus:outline-none transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v16h16V4H4zm4 8h8"/></svg>
                Update Figure
            </button>
        </form>
    </div>
</div>
@endsection