@extends('master')

@section('title', 'Manage Category')
@section('content')

<div id="container_managecategory">
    <div class="tengah">
        <a href="/insertcategory">
            <button style="width: 250px">Insert Category</button>
        </a>
        <table id="tablemanagecategory" style="width: 97%; height: 300px;overflow: auto;display: block">
            <tr>
                <th>Category Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ($category as $c)
            <tr style="font-size: 20px">
                <th><span>{{$c->category_name}}</span></th>
                <th>
                    <a href="/updatecategory/{{$c->id_category}}">
                        <button style="width: 100%">Edit</button>
                    </a>
                </th>
                <th>
                    <a href="/deletecategory/{{$c->id_category}}">
                        <button style="width: 100%">Delete</button>
                    </a>
                </th>    
              </tr>

            @endforeach
        </table>
        
    </div>
</div>


@endsection