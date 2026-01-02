@extends('master')

@section('title', 'Home')
@section('content')
<div id="containerbarang">
		<div class="left">
			<div id="Welcome">
				<span>Welcome</span>
				<span>{{$user}},</span>
			</div>
			<div id="Mimi_Figure_Shop">
					<span>Mimi Figure<br/>Shop</span>
				</div>
			<div id="Current_time">
				<span><div id="txt"></div>
                    </span>
			</div>
			<div id="search">
				<form action="home" method="post">
					@csrf
					<input type="text" style="width: 150px" name="search">
					<button name="searchBtn" value="" style="width:30px;"><i class="fa fa-search"></i></button>
				</form>
			</div>
		</div>

		<div id="rowBarang">
            @foreach($products as $p)
			<div class="column">
				<div class="card">
						<img src="storage/{{$p->product_image}}" alt="Tidak dapat memuat">
						<div id="isi">
							<a href="/detail/{{$p->id_product}}">{{$p->product_name}}</a><br><br>
							<span>{{str_limit($p->product_desc,15,' ...')}}</span><br><br>
							Rp.<span>{{$p->product_price}}</span>
							|| Qty. <span>{{$p->product_quantity}}</span>
							<br>
						</div>
						@if(Session::get('role') == "User")
						<div id="bawah">
							<h6>{{$p->categories->category_name}}</h6><br>
							<form action="/home" method="post" >
								@csrf
							<button type="submit" name="id_value" value="{{$p->id_product}}">Add to cart</button>
							</form>
						</div>
						@else
						<div id="bawah">
							<h5>{{$p->categories->category_name}}</h5>
						</div>
						@endif

				</div>
			</div>
		@endforeach
		<div class="pagination">
				{{ $products->links() }}
		</div>
	</div>
</div>
@endsection
