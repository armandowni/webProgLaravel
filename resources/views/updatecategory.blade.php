@extends('master')

@section('title', 'Update Category')
@section('content')
<div class="flex justify-center items-center">
    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-xl shadow-lg dark:bg-gray-800">
        <div class="flex flex-col items-center">
            <span class="text-2xl font-bold text-blue-700 dark:text-white mb-2">Update Category</span>
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
        <form action="/updatecategory" method="post" class="space-y-4">
            @csrf
            <div>
                <label for="category" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Category Name</label>
                <input type="text" name="category" id="category" value="{{$category->category_name}}" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <button type="submit" name="updateBtn" value="{{$category->id_category}}" class="flex items-center gap-2 px-5 py-2.5 text-white bg-blue-700 hover:bg-blue-800 rounded-lg font-medium focus:ring-2 focus:ring-blue-300 focus:outline-none transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v16h16V4H4zm4 8h8"/></svg>
                Update Category
            </button>
        </form>
    </div>
</div>
@endsection