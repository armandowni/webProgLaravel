@extends('master')

@section('title', 'Home')
@section('content')
    <div id="containerbarang" class="flex flex-col lg:flex-row items-start gap-3">
        <div class="w-full lg:w-[30%] flex items-start justify-start">
            <div
                class="rounded-2xl shadow-lg bg-gradient-to-br from-blue-600 to-blue-400 text-white p-6 mb-4 flex flex-col gap-4 w-full">
                <div class="flex flex-col sm:flex-row items-center sm:items-start gap-3">
                    <svg class="w-8 h-8 text-white flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A13.937 13.937 0 0112 15c2.387 0 4.623.418 6.879 1.204M15 10a3 3 0 11-6 0 3 3 0 016 0z">
                        </path>
                    </svg>
                    <div class="text-center sm:text-left">
                        <span class="text-2xl font-bold">Welcome,</span>
                        <span class="text-2xl font-semibold block">{{ $user ?: 'guest' }}</span>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row items-center gap-2">
                    <svg class="w-6 h-6 text-yellow-300 flex-shrink-0" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3"></path>
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none">
                        </circle>
                    </svg>
                    <span class="text-lg">Current time: <span id="txt" class="font-mono"></span></span>
                </div>
                <div class="mb-2">
                    <span class="block text-lg font-semibold">Mimi Figure <span class="text-yellow-200">Shop</span></span>
                </div>
                <div id="search">
                    <form action="home" method="post" class="flex flex-col sm:flex-row items-center gap-2 mt-2">
                        @csrf
                        <div class="relative w-full sm:flex-1">
                            <input type="text" name="search"
                                class="block w-full p-2 pl-10 text-sm text-blue-900 border border-blue-200 rounded-lg bg-blue-50 focus:ring-yellow-400 focus:border-yellow-400 dark:bg-blue-700 dark:border-blue-600 dark:placeholder-blue-200 dark:text-white dark:focus:ring-yellow-400 dark:focus:border-yellow-400"
                                placeholder="Search figures...">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-blue-400 dark:text-blue-200" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z"></path>
                                </svg>
                            </div>
                        </div>
                        <button type="submit" name="searchBtn" value=""
                            class="p-2.5 text-sm font-medium text-white bg-yellow-400 rounded-lg border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-200 dark:bg-yellow-500 dark:hover:bg-yellow-600 dark:focus:ring-yellow-300">
                            <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z"></path>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="flex-1">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                @foreach ($products as $p)
                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col">
                        <a href="/detail/{{ $p->id_product }}">
                            <img class="rounded-t-lg w-full object-cover h-48" src="storage/{{ $p->product_image }}"
                                alt="Tidak dapat memuat" />
                        </a>
                        <div class="p-5 flex-1 flex flex-col">
                            <a href="/detail/{{ $p->id_product }}">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $p->product_name }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                {{ str_limit($p->product_desc, 15, ' ...') }}</p>
                            <div class="mb-2 text-base text-gray-900 dark:text-white">
                                Rp.<span>{{ $p->product_price }}</span> &nbsp;| Qty. <span>{{ $p->product_quantity }}</span>
                            </div>
                            <div class="mt-auto">
                                @if (Session::get('role') == 'User')
                                    <div class="mb-2 text-sm text-blue-700 dark:text-blue-300 font-semibold">
                                        {{ $p->categories->category_name }}</div>
                                    <form action="/home" method="post">
                                        @csrf
                                        <button type="submit" name="id_value" value="{{ $p->id_product }}"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Add to cart
                                        </button>
                                    </form>
                                @else
                                    <div class="mb-2 text-sm text-blue-700 dark:text-blue-300 font-semibold">
                                        {{ $p->categories->category_name }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @if ($products->lastPage() > 1)
                <nav aria-label="Page navigation example" class="flex justify-center mt-8">
                    <ul class="inline-flex -space-x-px text-sm">
                        {{-- Previous Page Link --}}
                        <li>
                            <a href="{{ $products->previousPageUrl() ?: '#' }}"
                                class="flex items-center justify-center px-3 h-8 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white{{ $products->onFirstPage() ? ' pointer-events-none opacity-50' : '' }}">
                                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7"></path>
                                </svg>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        {{-- Pagination Elements --}}
                        @for ($i = 1; $i <= $products->lastPage(); $i++)
                            <li>
                                <a href="{{ $products->url($i) }}"
                                    class="flex items-center justify-center px-3 h-8 leading-tight border border-gray-300 {{ $products->currentPage() == $i ? 'text-white bg-blue-700 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 dark:text-white' : 'text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' }}">
                                    {{ $i }}
                                </a>
                            </li>
                        @endfor
                        {{-- Next Page Link --}}
                        <li>
                            <a href="{{ $products->nextPageUrl() ?: '#' }}"
                                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white{{ $products->hasMorePages() ? '' : ' pointer-events-none opacity-50' }}">
                                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            @endif
        </div>
    </div>
@endsection
