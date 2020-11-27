@extends('master')

@section('title', 'Insert Category')
@section('content')
<div id="container_insertcat">
    <div class="tengah">
        <div class="judul">
            <span>New Category</span>
        </div>
        <form action="/insertcategory" method="post">
            @csrf
            <input type="text" name="category" placeholder="Category">
            <button type="submit">INSERT CATEGORY</button>
        </form>
    </div>
</div>
@endsection