@extends('master')

@section('title', 'Feedback')
@section('content')
<div id="container_feedback">
    <div class="tengah">
        <div class="judul">
            <span>New Feedback</span>
        </div>
        @if ($errors->any())
            <div class="isa_error">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif
        <form action="/feedbackUser" method="post">
            @csrf
            <textarea name="userFeedback" id="" cols="30" rows="5" placeholder="FeedBack"></textarea>
            <button type="submit">INSERT NEW FEEDBACK</button>
        </form>
    </div>
</div>
@endsection