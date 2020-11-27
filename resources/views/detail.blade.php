@extends('master')

@section('title', 'Detail')
@section('content')
<div id="container_detail">
    <div class="kanan">
        <div id="Figure_Description">
            <span>Figure Description</span><br>
            {{$detail->product_desc}}
        </div>
        <div id="Figure_Detail">
            <span>Figure Detail</span><br>
            <ul>
                <li>Category: {{$detail->product_category}}</li>
                <li>Quantity: {{$detail->product_quantity}}</li>
                <li>Price: Rp{{$detail->product_price}}</li>
            </ul>
        </div>
    </div>
    <img class="Rectangle_12" src="../storage/{{$detail->product_image}}" alt="Tidak bisa memuat">
</div>
@endsection