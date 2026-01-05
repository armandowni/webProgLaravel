@extends('master')

@section('title', 'Feedback')
@section('content')
<div class="flex justify-center items-center">
    <div class="w-full max-w-xl p-8 space-y-6 bg-white rounded-xl shadow-lg dark:bg-gray-800">
        <div class="flex flex-col items-center">
            <span class="text-2xl font-bold text-blue-700 dark:text-white mb-2">New Feedback</span>
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
        <form action="/feedbackUser" method="post" class="space-y-4">
            @csrf
            <div>
                <label for="userFeedback" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Your Feedback</label>
                <textarea name="userFeedback" id="userFeedback" rows="5" placeholder="Feedback" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
            </div>
            <button type="submit" class="flex items-center gap-2 px-5 py-2.5 text-white bg-blue-700 hover:bg-blue-800 rounded-lg font-medium focus:ring-2 focus:ring-blue-300 focus:outline-none transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                Submit Feedback
            </button>
        </form>
    </div>
</div>
@endsection