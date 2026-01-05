@extends('master')

@section('title', 'Sign In')
@section('content')

    <div class="flex justify-center items-center h-full">
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-xl shadow-lg dark:bg-gray-800">
            <div class="flex flex-col items-center">
                <span class="text-3xl font-bold text-blue-700 dark:text-white mb-2">Sign In</span>
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
            <form action="signin" method="post" class="space-y-4">
                @csrf
                <div>
                    <label for="userEmail" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Email
                        Address</label>
                    <input name="userEmail" type="email" id="userEmail" placeholder="Email Address" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="userPassword"
                        class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Password</label>
                    <input name="userPassword" type="password" id="userPassword" placeholder="Password" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" name="remember_Me" value="yes"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:bg-gray-700 dark:border-gray-600">
                        <label for="remember_me" class="ml-2 text-sm text-gray-700 dark:text-gray-200">Remember Me</label>
                    </div>
                    <a href="/forgot-password" class="text-sm text-blue-600 hover:underline dark:text-blue-400">Forgot
                        password?</a>
                </div>

                <div class="flex flex-col items-center gap-2">
                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign
                        In</button>
                    <a href="/register" class="text-sm text-blue-600 hover:underline dark:text-blue-400">Don't have
                        account?</a>
                </div>
            </form>
        </div>
    </div>

@endsection
