@extends('master')

@section('title', 'cart')
@section('content')
<div id="container_cart">
    <div class="tengah">
        <table id="tablecart" style="width: 97%;display: block;table-layout: fixed">
            <thead style="margin-left: -100px;width: 97%;display: table; ">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody style=" height: 300px;overflow: auto;display: inline-block">
            @foreach($cart as $p)
                <tr>
                    <th>
                        <img src="../storage/{{$p->products->product_image}}" alt="Tidak memuat" style="border: 1px solid black;" width="100px" height="100px">
                        <span>{{$p->products->product_name}}</span>
                    </th>
                    <th>
                        <input type="number" disabled placeholder={{$p->cart_quantity}}>
                    </th>
                    <th>
                        <span>Rp. {{$p->products->product_price}}</span>
                    </th>
                    <th>
                        <form action="/cart" method="post" >
                            @csrf
                            <button type="submit" name="removeBtn" value="{{$p->id_cart}}">Remove</button>
                        </form>
                    </th>
                </tr>
            @endforeach
            </tbody>
                <tr>
                    <th>
                        <span>Total</span>
                    </th>
                    <th>
                        <span>Rp. {{$total}}</span>
                    </th>
                </tr>
            <tr>
                <td>
                    <form action="/cart" method="post">
                        @csrf
                    <button id="btn_checkout" name="checkoutBtn" type="submit">CHECKOUT</button>
                    </form>
                </td>
            </tr>
        </table>
    </div>
</div>


@endsection
