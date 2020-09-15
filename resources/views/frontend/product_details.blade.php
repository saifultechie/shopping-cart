@extends('frontend.master')
@section('title','product detail')
@section('content')
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-6">
				<div class="thumbnail">
					<img src="{{url('images',$product->pro_image)}}" style="height: 500px;width: 500px;" class="img-fluid">
				</div>
			</div>
			<div class="col-md-5">
				<h2><?php ucwords($product->pro_name)?></h2>
				<h5>{{$product->pro_info}}</h5>
				<h4 class="text-danger">{{$product->sp1_price}}</h4>
				<p><b>Available: {{$product->stock}} in our stock </b></p>
				
                            <a href="{{url('cart/add-item',$product->id)}}" class="btn btn-sm btn-outline-secondary">Add to cart<i class="fa fa-shopping-cart"></i></a>
				<br>
				<br>
				<button class="btn btn-xs btn-default">
					Wishlist
				</button>
			</div>

		</div>
	</div>
@endsection