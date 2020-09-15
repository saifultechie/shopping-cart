@extends('admin.master')

@section('title','crate product')
@section('content')
	<div class="container-fluid">
		<div class="row">
		<main class="col-sm-9 ml-sm-auto col-md-10 pt-3" style="margin-top: 50px">
		<h3>Add New Product</h3>
		<div class="col-md-6">
			<div class="panel-body">
				<form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group">
						<label for="pro_name">Product name</label>
						<input type="text" name="pro_name" class="form-control" placeholder="enter product name">

						@if($errors->has('pro_name'))
							<span class="text-danger">{{$errors->first('pro_name')}}</span>
						@endif
					</div>
					<div class="form-group">
						<label for="pro_code">Product code</label>
						<input type="text" name="pro_code" class="form-control" placeholder="enter product code">
						@if($errors->has('pro_code'))
							<span class="text-danger">{{$errors->first('pro_code')}}</span>
						@endif
					</div>
					<div class="form-group">
						<label for="pro_price">Product price</label>
						<input type="text" name="pro_price" class="form-control" placeholder="enter product price">
						@if($errors->has('pro_price'))
							<span class="text-danger">{{$errors->first('pro_price')}}</span>
						@endif
					</div>
					<div class="form-group">
						<label for="stock">Stock</label>
						<input type="text" name="stock" class="form-control" placeholder="stock">
						@if($errors->has('stock'))
							<span class="text-danger">{{$errors->first('stock')}}</span>
						@endif
					</div>
					<div class="form-group">
						<label for="pro_info">Product Description</label>
						<textarea type="text" class="form-control" name="pro_info"></textarea>
						@if($errors->has('pro_info'))
							<span class="text-danger">{{$errors->first('pro_info')}}</span>
						@endif
					</div>
					<div class="form-group">
						<label for="category_id">Category</label>
						<select name="category_id" id="category_id" class="form-control">
							<option>select category</option>
							@foreach($categories as $category)
								<option value="{{$category->id}}">{{$category->name}}</option>
							@endforeach
						</select>
						@if($errors->has('category_id'))
							<span class="text-danger">{{$errors->first('category_id')}}</span>
						@endif
					</div>
					<div class="form-group">
						<label for="image">Product image</label>
						<input type="file" name="image" class="form-control">
						@if($errors->has('image'))
							<span class="text-danger">{{$errors->first('image')}}</span>
						@endif
					</div>
					<div class="form-group">
						<label for="sp1_price">Sale price</label>
						<input type="text" name="sp1_price" class="form-control" placeholder="enter sale price">
						@if($errors->has('sp1_price'))
							<span class="text-danger">{{$errors->first('sp1_price')}}</span>
						@endif
					</div>
					<div class="form-group">
						<input type="submit" name="create" value="create product" class="btn btn-success">
					</div>
				</form>
			</div>
		</div>
	</main>
		</div>
	</div>
	
@endsection