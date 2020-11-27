@extends('master')

@section('title', 'Manage Feedback')
@section('content')

<div id="container_managefeedback">
    <div class="tengah">
        <table id="tablemanagefeedback" style="width: 97%; height: 300px;overflow: auto;display: block;">
            <tr style="border-bottom: 1px solid black;" >
                <th>Feedback Description</th>
                <th>Status</th>
                <th>Approve</th>
                <th>Reject</th>
            </tr>
            @foreach ($feedback as $fb)
            <tr style="font-size: 20px;">
                    <th>
                        <span>{{$fb->textfeedback}}</span>
                    </th>
                    <th>
                        <span>{{$fb->feedvalidate}}</span>
                    </th>
                        <form action="/updatestatus/{{$fb->id_feedback}}" method="post">
                            @csrf
                    <th>
                            <button name="btnStatus" value="Accepted" style="width: 100%;">Accept</button>
                    </th>
                    <th>
                            <button name="btnStatus" style="width: 100%;"value="Reject">Reject</button>
                    </th>
                        </form>
              </tr>
              @endforeach
        </table>
        
    </div>
</div>

@endsection