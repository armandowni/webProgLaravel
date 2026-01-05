@extends('master')

@section('title', 'Register')
@section('content')
    <div class="flex justify-center items-center ">
        <div class="w-full max-w-lg p-8 space-y-6 bg-white rounded-xl shadow-lg dark:bg-gray-800">
            <div class="flex flex-col items-center">
                <span class="text-3xl font-bold text-blue-700 dark:text-white mb-2">Sign Up</span>
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
            <form action="/register" method="post" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label for="fullname"
                        class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Fullname</label>
                    <input type="text" name="fullname" id="fullname" placeholder="Fullname" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="userEmail"
                        class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Email</label>
                    <input type="email" name="userEmail" id="userEmail" placeholder="Email" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="userPassword"
                        class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Password</label>
                    <input type="password" name="userPassword" id="userPassword" placeholder="Password" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="userConfirmPassword"
                        class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Confirm Password</label>
                    <input type="password" name="userConfirmPassword" id="userConfirmPassword"
                        placeholder="Confirm Password" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="userAddress"
                        class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Address</label>
                    <input type="text" name="userAddress" id="userAddress" placeholder="Address" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="userPhone" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Phone
                        Number</label>
                    <input type="text" name="userPhone" id="userPhone" placeholder="Phone Number" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="userGender"
                        class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Gender</label>
                    <select name="userGender" id="userGender" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option disabled selected value>Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div>
                    <label for="userPic" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Profile
                        Picture</label>
                    <input type="file" name="userPic" id="userPic" accept="image/*"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                </div>
                <div class="flex items-center">
                    <input id="termandcondition" type="checkbox" name="termandcondition" value="yes" required
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:bg-gray-700 dark:border-gray-600">
                    <label for="termandcondition" class="ml-2 text-sm text-gray-700 dark:text-gray-200">I agree to the Terms
                        and Conditions</label>
                </div>
                <button type="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register</button>
                <div class="flex justify-center">
                    <a href="/signin" class="text-sm text-blue-600 hover:underline dark:text-blue-400">Already have an
                        account?</a>
                </div>
            </form>
        </div>
    </div>
@endsection
