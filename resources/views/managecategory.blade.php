@extends('master')

@section('title', 'Manage Category')
@section('content')

<div id="container_managecategory">
    <div class="tengah">
        <div class="mb-4 flex justify-end">
    <a href="/insertcategory" class="inline-block">
        <button class="px-6 py-2 text-white bg-blue-700 hover:bg-blue-800 rounded-lg font-medium focus:ring-2 focus:ring-blue-300 focus:outline-none transition flex items-center gap-2">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
    Add Category
</button>
    </a>
</div>
<div class="overflow-x-auto rounded-lg shadow">
    <table class="min-w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs uppercase bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
            <tr>
                <th class="px-4 py-3">Category Name</th>
                <th class="px-4 py-3">Edit</th>
                <th class="px-4 py-3">Delete</th>
            </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-800">
        @foreach ($category as $c)
            <tr class="border-b dark:border-gray-700">
                <td class="px-4 py-3">{{$c->category_name}}</td>
                <td class="px-4 py-3">
                    <a href="/updatecategory/{{$c->id_category}}">
                        <button class="w-full px-3 py-2 text-white bg-yellow-500 hover:bg-yellow-600 rounded-lg font-medium focus:ring-2 focus:ring-yellow-300 focus:outline-none transition flex items-center gap-2">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536M9 11l6.293-6.293a1 1 0 011.414 0l2.586 2.586a1 1 0 010 1.414L11 17H7v-4z"/></svg>
    Edit
</button>
                    </a>
                </td>
                <td class="px-4 py-3">
                    <a href="/deletecategory/{{$c->id_category}}">
                        <button class="w-full px-3 py-2 text-white bg-red-600 hover:bg-red-700 rounded-lg font-medium focus:ring-2 focus:ring-red-300 focus:outline-none transition flex items-center gap-2">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2"/></svg>
    Delete
</button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
        
    </div>
</div>


@endsection