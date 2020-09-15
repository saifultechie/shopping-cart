@extends('frontend.master')
@section('title','Shop')
@section('content')
      <main role="main">
          <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">Online shoping</h1>
              <p class="lead">This is an Ecommerce site.</p>
            </div>
        </div>
    
          <div class="album py-5 bg-light">
            <div class="container">
              <div class="row">
                @foreach($products as $product)
                  <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                      <img class="card-img-top" alt="Card image cap" src="{{url('images',$product->pro_image)}}">
                      <div class="card-body">
                        <div class="card-text">{{$product->pro_name}}</div>
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">View Product</button>
                            
                            <a href="{{url('cart/add-item',$product->id)}}" class="btn btn-sm btn-outline-secondary">Add to cart<i class="fa fa-shopping-cart"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
              </div>
            </div>
          </div>

    </main>
@endsection