@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row gap-8">
        <!-- Left Sidebar -->
        <div class="w-full md:w-1/4 space-y-6">
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="space-y-2">
                    <h1 class="text-2xl font-bold text-gray-800">Welcome</h1>
                    <p class="text-gray-600">{{ $user }},</p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-3xl font-bold text-indigo-600 mb-2">Mimi Figure Shop</h2>
                <p class="text-gray-500">Your one-stop figure shop</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <div id="txt" class="text-2xl font-mono text-gray-800"></div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <form action="home" method="post" class="flex">
                    @csrf
                    <input type="text" 
                           name="search" 
                           placeholder="Search products..."
                           class="flex-1 px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <button type="submit" 
                            name="searchBtn" 
                            value=""
                            class="bg-indigo-600 text-white px-4 py-2 rounded-r-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="w-full md:w-3/4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($products as $p)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="h-48 overflow-hidden">
                        <img src="storage/{{ $p->product_image }}" 
                             alt="{{ $p->product_name }}"
                             class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">
                            <a href="/detail/{{ $p->id_product }}" class="hover:text-indigo-600 transition-colors">
                                {{ $p->product_name }}
                            </a>
                        </h3>
                        <p class="text-gray-600 text-sm mb-3">
                            {{ str_limit($p->product_desc, 60, '...') }}
                        </p>
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-lg font-bold text-indigo-600">Rp. {{ number_format($p->product_price, 0, ',', '.') }}</span>
                            <span class="text-sm text-gray-500">Qty: {{ $p->product_quantity }}</span>
                        </div>
                        
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            @if(Session::get('role') == "User")
                                <div class="flex justify-between items-center">
                                    <span class="inline-block bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded">
                                        {{ $p->categories->category_name }}
                                    </span>
                                    <form action="/home" method="post">
                                        @csrf
                                        <button type="submit" 
                                                name="id_value" 
                                                value="{{ $p->id_product }}"
                                                class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition-colors">
                                            Add to Cart
                                        </button>
                                    </form>
                                </div>
                            @else
                                <span class="inline-block bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded">
                                    {{ $p->categories->category_name }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Add the time script -->
<script>
    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML = h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);
    }
    function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
    }
    // Start the clock when the page loads
    window.onload = startTime;
</script>
@endsection
