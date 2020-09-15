@extends('admin.master')
@section('title','product list')
@section('content')
	 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	 	<br><br>
         <h2 class="text-center">List Products</h2>
         <div class="table-responsive">
         	<table class="table table-hover">
         		<thead>
         			<tr>
         				<th>Image</th>
         				<th>Name</th>
         				<th>Price</th>
         				<th>Delete</th>
         			</tr>
         		</thead>
         		<tbody>
         			@foreach($products as $product)
         			<tr>
         				<td><img src="{{asset('images/'.$product->pro_image)}}" style="width: 50px;height: 50px;"></td>
         				<td>{{ $product->pro_name}}</td>
         				<td>{{ $product->pro_price}}</td>
         				<td>
         					<form action="{{ route('products.destroy',$product->id)}}" method="post">
         						{{csrf_field()}}
         						{{method_field('DELETE')}}
         						<input type="submit" name="submit" value="Delete" class="btn btn-sm btn-danger">
         					</form>
         				</td>
         			</tr>
         			@endforeach
         		</tbody>
         	</table>
         </div>
     </main>
@endsection