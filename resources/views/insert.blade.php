@extends('master')

@section('title', 'Insert')
@section('content')
    <div class="flex justify-center items-center">
        <div class="w-full max-w-lg p-8 space-y-6 bg-white rounded-xl shadow-lg dark:bg-gray-800">
            <div class="flex flex-col items-center">
                <span class="text-3xl font-bold text-blue-700 dark:text-white mb-2">Insert Figure</span>
                <svg class="w-20 h-3 mb-4" fill="none" stroke="rgba(112,112,112,1)" stroke-width="2" viewBox="0 0 80 3">
                    <rect x="0" y="0" width="80" height="3" rx="1.5" fill="rgba(112,112,112,0.1)"></rect>
                </svg>
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
                    <label for="figurename" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Figure
                        Name</label>
                    <input type="text" name="figurename" id="figurename" placeholder="Figure Name" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Description</label>
                    <textarea name="description" id="description" rows="4" placeholder="Description" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="quantity"
                            class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Quantity</label>
                        <input type="number" name="quantity" id="quantity" placeholder="Quantity" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div>
                        <label for="price"
                            class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Price</label>
                        <input type="number" name="price" id="price" placeholder="Price" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>
                <div>
                    <label for="category"
                        class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Category</label>
                    <select name="category" id="category" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option disabled selected value>Category</option>
                        @foreach ($category as $c)
                            <option value="{{ $c->id_category }}">{{ $c->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="figurepic" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Figure
                        Picture</label>
                    <input type="file" name="figurepic" id="figurepic" accept="image/*"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                </div>
                <button type="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">INSERT</button>
            </form>
        </div>
    </div>
@endsection
