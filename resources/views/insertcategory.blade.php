@extends('master')

@section('title', 'Insert Category')
@section('content')
    <div class="flex justify-center items-center">
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-xl shadow-lg dark:bg-gray-800">
            <div class="flex flex-col items-center">
                <span class="text-3xl font-bold text-blue-700 dark:text-white mb-2">New Category</span>
                <svg class="w-20 h-3 mb-4" fill="none" stroke="rgba(112,112,112,1)" stroke-width="2" viewBox="0 0 80 3">
                    <rect x="0" y="0" width="80" height="3" rx="1.5" fill="rgba(112,112,112,0.1)"></rect>
                </svg>
            </div>
            <form action="/insertcategory" method="post" class="space-y-4">
                @csrf
                <div>
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Category
                        Name</label>
                    <input type="text" name="category" id="category" placeholder="Category" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <button type="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">INSERT
                    CATEGORY</button>
            </form>
        </div>
    </div>
    </div>
@endsection
