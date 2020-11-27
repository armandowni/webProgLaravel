@extends('master')

@section('title', 'Update Category')
@section('content')
<div id="container_insertcat">
    <div class="tengah">
        <div class="judul">
            <span>Update Category</span>
        </div>
        @if ($errors->any())
            <div class="isa_error">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif
        <form action="/updatecategory" method="post">
            @csrf
            <input type="text" name="category" value="{{$category->category_name}}">
            <button type="submit" name="updateBtn" value="{{$category->id_category}}">UPDATE CATEGORY</button>
        </form>
    </div>
</div>
@endsection