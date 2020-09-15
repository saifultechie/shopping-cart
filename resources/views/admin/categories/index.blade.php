@extends('admin.master')
@section('title','create Category')

@section('content')

	<main class="col-sm-9 col-md-10 pt-3 ml-sm-auto" role="main" style="margin-top: 50px;">
		<h3 style="text-decoration: underline;">list categories</h3>
		<a href="" class="navbar-brand">Categories</a>
		<ul class="nav navbar-nav">
			@if(!empty($categories))
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Category Id</th>
								<th>Category Name</th>
							</tr>
						</thead>
						<tbody>
							@forelse($categories as $category)
							<tr>
								<td>{{$category->id}}</td>
								<td>{{$category->name}}</td>
							</tr>
							@empty
								<li>no category availabe</li>
							@endforelse
						</tbody>
					</table>
				</div>
			@endif
		</ul>
		<form action="{{route('category.store')}}" method="post">
			{{csrf_field()}}
			<div class="form-group">
				<label>Category name</label>
				<input type="text" name="name" class="form-control" placeholder="enter category name">
			</div>
			<input type="submit" value="save" class="btn btn-primary">
		</form>
	</main>
@endsection