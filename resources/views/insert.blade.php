@extends('master')

@section('title', 'Insert')
@section('content')

<div id="containerInsert">
    @if ($errors->any())
        <div class="isa_error">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
            <form action="/insert" method="post" enctype="multipart/form-data">
                @csrf
                <div id="Insert_Figure">
                    <span>Insert Figure</span>
                </div>

                <div id="figurename">
                    <div id="Figurename">
                        <input type="text" name="figurename" placeholder="Figure Name" style="height: 50px">
                    </div>
                </div>
                <div id="descfig" style="top: 110px">
                        <div id="Decription">
                            <textarea cols="100" rows="5" name="description" placeholder="Description"></textarea>
                        </div>
                </div>
                <div id="quantity" style="top: 190px">
                        <div id="category_A2_Text_7">
                            <input type="number" name="quantity" placeholder="Quantity" style="height: 40px">
                        </div>
                </div>
                <div id="price" style="top: 240px">
                    <div id="category_A2_Text_6">
                        <input type="number" name="price" placeholder="Price" style="height: 40px">
                    </div>
                </div>
                <div id="category" style="top: 290px">
                    <select name="category" style="height: 40px">
                        <option disabled selected value >Category</option>
                        @foreach($category as $c)
                        <option value="{{$c->id_category}}">{{$c->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div id="Pp">
                    <div id="button_browse" class="button_browse">
                        <div id="Browse___">
                            <input type="file" name="figurepic" accept="image/*">
                        </div>
                    </div>
                    <div id="pp">
                        <span>Figure Picture</span>
                    </div>
                </div>
                <div id="Button_Sign_in">
                        <div id="INSERT">
                            <button type="submit">INSERT</button>
                        </div>
                </div>
            </form>
        </div>
@endsection
