@extends('frontend.master')
@section('title','Category Product')
@section('content')
      <main role="main">
          <div class="album py-5 bg-light">
            <div class="container">
              <?php $cats = DB::table('categories')->select('name')->where('id',$id_)->get();?>
              <h4>
                Category:
                @foreach($cats as $cat)
                    {{$cat->name}}
                @endforeach
                
              </h4>
              <br>
              <div class="row">
                @foreach($categories_product as $product)
                  <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                      <img class="card-img-top" alt="Card image cap" src="{{url('images',$product->pro_image)}}">
                      <div class="card-body">
                        <del>{{$product->pro_price}}</del>
                        <span>{{$product->sp1_price}}</span>
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">View Product</button>
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