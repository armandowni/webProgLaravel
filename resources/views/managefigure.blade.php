@extends('master')

@section('title', 'Manage Figure')
@section('content')
<div id="container_managefigure">
    <div class="tengah" style="left: 10px">
        <div class="insertbtn">
            <a href="/insert">
                <button style="width: 250px">Insert Figure</button>
            </a>
        </div>
        <div class="pagination">
            {{ $products->links() }}
        </div>
        <table id="tablemanagefigure" style="width: 97%; height: 450px;overflow: auto;display: block">
            <thead>
                <tr style="border-bottom: 1px solid black;">
                    <th>Figure Picture</th>
                    <th>Figure Name</th>
                    <th>Figure Category</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            @foreach($products as $p)
            <tbody style="">
                <tr style="font-size: 20px;">
                    <th>
                        <img src="storage/{{$p->product_image}}" alt="Tidak dapat memuat" style="width: 100px; height: 100px;">
                    </th>
                    <th><span>{{$p->product_name}}</span></th>
                    <th><span>{{$p->categories->category_name}}</span></th>
                    <th><span>{{$p->product_desc}}</span></th>
                    <th><span>{{$p->product_quantity}}</span></th>
                    <th><span>Rp. {{$p->product_price}}</span></th>
                    <th>
                        <a href="/updatefigure/{{$p->id_product}}">
                            <button style="width: 100%;">Edit</button>
                        </a>
                    </th>
                    <th>
                        <a href="/deletefigure/{{$p->id_product}}">
                            <button style="width: 100%;">Delete</button>
                        </a>
                    </th>
                </tr>
            </tbody>
            @endforeach
        </table>

    </div>

</div>
@endsection