    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><img src="{{url('images/logo.png')}}" style="height: 100px;width: 100px;border-radius: 10px" class="rounded-circle"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('shop')}}">Shop</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php $categories = DB::table('categories')->get();?>
          @foreach($categories as $category)
          <a class="dropdown-item" href="{{url('category',$category->id)}}">{{ucwords($category->name)}}</a>
          @endforeach
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/contact')}}">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/wishlist')}}">Wishlist</a>
      </li>
      <?php if(Auth::check()){?>
         <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                  <a class="dropdown-item" href="#">{{Auth::user()->name}}</a>
                  <a class="dropdown-item" href="{{url('/logout')}}">Logout</a>
                  <a class="dropdown-item" href="{{url('/')}}/profile">Profile</a>
              </div>
          </li> 
        <?php } else {?>
          <li class="nav-item"><a class="nav-link" href="{{url('/login')}}">Login</a></li>
      <?php }?>
       <li class="nav-item" style="list-style-type: none;">
                <a href="{{url('/cart')}}" class="nav-link">&nbsp;Cart&nbsp;({{Cart::count()}} items)&nbsp;({{Cart::total()}} $)</a>
       </li>
    </ul>
  </div>
</nav>
