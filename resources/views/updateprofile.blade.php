@extends('master')

@section('title', 'Profile')
@section('content')
    <div class="flex justify-center items-center">
        <div class="w-full max-w-lg p-8 space-y-6 bg-white rounded-xl shadow-lg dark:bg-gray-800">
            <div class="flex flex-col items-center">
                <span class="text-3xl font-bold text-blue-700 dark:text-white mb-2">Personal Info</span>
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
            <form action="profile" method="post" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label for="fullname"
                        class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Fullname</label>
                    <input type="text" name="fullname" id="fullname" placeholder="Fullname"
                        value="{{ $profile->fullname }}" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="userEmail"
                        class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Email</label>
                    <input type="email" name="userEmail" id="userEmail" placeholder="Email" value="{{ $profile->email }}"
                        required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="userAddress"
                        class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Address</label>
                    <input type="text" name="userAddress" id="userAddress" placeholder="Address"
                        value="{{ $profile->address }}" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="userPhone" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Phone
                        Number</label>
                    <input type="text" name="userPhone" id="userPhone" placeholder="Phone Number"
                        value="{{ $profile->phone }}" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="userGender"
                        class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Gender</label>
                    <select name="userGender" id="userGender" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="{{ $profile->gender }}">{{ $profile->gender }}</option>
                        @if ($profile->gender == 'Male')
                            <option value="Female">Female</option>
                        @else
                            <option value="Male">Male</option>
                        @endif
                    </select>
                </div>
                <div>
                    <label for="userPic" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Profile
                        Picture</label>
                    <input type="file" name="userPic" id="userPic" accept="image/*"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                </div>
                <button type="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 20h9" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Edit Profile
                </button>
            </form>
        </div>
    </div>
@endsection
