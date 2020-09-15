@extends('frontend.master')
@section('title','Home Page')
@section('content')
      <main role="main">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{URL::asset('dist/img/cloth1.jpg')}}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{URL::asset('dist/img/cloth2.jpg')}}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{URL::asset('dist/img/cloth3.jpg')}}" class="d-block w-100" alt="...">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
          </div>

          <div class="album py-5 bg-light">
            <div class="container">
              <div class="row">
                @foreach($products as $product)
                  <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                      <img class="card-img-top" alt="Card image cap" src="{{url('images',$product->pro_image)}}">
                      <div class="card-body">
                        <del>{{$product->pro_price}}</del>
                        <span>{{$product->sp1_price}}</span>
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <a href="{{url('productDetails',$product->id)}}" class="btn btn-sm btn-outline-secondary">View</a>
                            <a href="{{url('cart/add-item',$product->id)}}" class="btn btn-sm btn-outline-secondary">Add to cart<i class="fa fa-shopping-cart"></i></a>
                          </div>
                          <small class="text-muted">9 mins</small>
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