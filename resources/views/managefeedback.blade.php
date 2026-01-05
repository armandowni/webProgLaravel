@extends('master')

@section('title', 'Manage Feedback')
@section('content')

<div id="container_managefeedback">
    <div class="tengah">
        <div class="overflow-x-auto rounded-lg shadow">
    <table class="min-w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs uppercase bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
            <tr>
                <th scope="col" class="px-6 py-3">Feedback Description</th>
                <th scope="col" class="px-6 py-3">Status</th>
                <th scope="col" class="px-6 py-3">Approve</th>
                <th scope="col" class="px-6 py-3">Reject</th>
            </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-800">
            @foreach ($feedback as $fb)
            <tr class="border-b dark:border-gray-700">
                <td class="px-6 py-4">{{$fb->textfeedback}}</td>
                <td class="px-6 py-4">{{$fb->feedvalidate}}</td>
                <td class="px-6 py-4">
                    <form action="/updatestatus/{{$fb->id_feedback}}" method="post" class="inline">
                        @csrf
                        <button name="btnStatus" value="Accepted" class="w-full px-4 py-2 text-white bg-green-600 hover:bg-green-700 rounded-lg focus:ring-2 focus:ring-green-300 focus:outline-none transition">Accept</button>
                    </form>
                </td>
                <td class="px-6 py-4">
                    <form action="/updatestatus/{{$fb->id_feedback}}" method="post" class="inline">
                        @csrf
                        <button name="btnStatus" value="Reject" class="w-full px-4 py-2 text-white bg-red-600 hover:bg-red-700 rounded-lg focus:ring-2 focus:ring-red-300 focus:outline-none transition">Reject</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
        
    </div>
</div>

@endsection