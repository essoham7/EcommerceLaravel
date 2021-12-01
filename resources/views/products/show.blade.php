@extends('layouts.store')

@section('store')



<section class="py-3 bg-light">
    <div class="container">
      <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href=""> Detail </a></li>
          <li class="breadcrumb-item"><a href="#">
              @foreach ($product->categories as $category)
                     {{ $category->name}}{{ $loop->last ? '' : '/ '}}
              @endforeach</a></li>

          <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
      </ol>
    </div>
  </section>

  <!-- ========================= SECTION CONTENT ========================= -->
  <section class="section-content bg-white padding-y">
  <div class="container">

  <!-- ============================ ITEM DETAIL ======================== -->
      <div class="row">
          <aside class="col-md-6">
 <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <div id="carouselExampleIndicators" class="card ">
  <article class="gallery-wrap">


      <div class="img-big-wrap carousel-inner">
        <div class="carousel-item active"> <a href="#"><img src="{{ $product->image1 }}"></a></div>
        <div class="carousel-item"> <a href="#"><img src="{{ $product->image2 }}"></a></div>
        <div class="carousel-item"> <a href="#"><img src="{{ $product->image3 }}"></a></div>
        <div class="carousel-item"> <a href="#"><img src="{{ $product->image4 }}"></a></div>
      </div> <!-- slider-product.// -->

      <div class="thumbs-wrap carousel-indicators">
        {{-- <ol class="carousel-indicators">
            <li  ></li>
            <li></li>
            <li ></li>
            <li ></li>
          </ol> --}}
        <a href="#" data-target="#carouselExampleIndicators" data-slide-to="0" class="active item-thumb"> <img src="{{ $product->image1 }}"></a>
        <a href="#" data-target="#carouselExampleIndicators" data-slide-to="1" class="item-thumb"> <img src="{{ $product->image2 }}"></a>
        <a href="#" data-target="#carouselExampleIndicators" data-slide-to="2" class="item-thumb"> <img src="{{ $product->image3 }}"></a>
        <a href="#" data-target="#carouselExampleIndicators" data-slide-to="3" class="item-thumb"> <img src="{{ $product->image4 }}"></a>
      </div> <!-- slider-nav.// -->
  </article> <!-- gallery-wrap .end// -->
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div> <!-- card.// -->
 </div>

          </aside>
          <main class="col-md-6">
  <article class="product-info-aside">

  <h2 class="title mt-3"> {{ $product->title }} </h2>

  <div class="rating-wrap my-3">
      <ul class="rating-stars">
          <li style="width:80%" class="stars-active">
              <i class="fa fa-star"></i> <i class="fa fa-star"></i>
              <i class="fa fa-star"></i> <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
          </li>
          <li>
              <i class="fa fa-star"></i> <i class="fa fa-star"></i>
              <i class="fa fa-star"></i> <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
          </li>
      </ul>
      <small class="label-rating text-muted">132 reviews</small>
      <small class="label-rating text-success"> <i class="fa fa-clipboard-check"></i> 154 orders </small>
  </div> <!-- rating-wrap.// -->

  <div class="mb-3">
      <var class="price h4">USD {{ $product->getPrice() }}</var>
      {{-- <span class="text-muted">USD 562.65 incl. VAT</span>  --}}
  </div> <!-- price-detail-wrap .// -->
  <div class="mb-2">
    <var class="price h6">Categories:
      @foreach ($product->categories as $category)
       {{ $category->name}}{{ $loop->last ? '' : ', '}}
       @endforeach
      </var>
    {{-- <span class="text-muted">USD 562.65 incl. VAT</span>  --}}
</div>

  <p> {{ $product->subtitle }} </p>


  <dl class="row">
    <dt class="col-sm-3">Categories</dt>
    {{-- @foreach ($product->categories as $category) --}}
        {{-- {{ $category->name}}{{ $loop->last ? '' : ', '}} --}}
    <dd class="col-sm-9"><a href="#">
      @foreach ($product->categories as $category)
      {{ $category->name}}{{ $loop->last ? '' : ', '}}
      @endforeach</a></dd>
    {{-- @endforeach --}}

    <dt class="col-sm-3">Article number</dt>
    <dd class="col-sm-9">596 065</dd>

    <dt class="col-sm-3">Guarantee</dt>
    <dd class="col-sm-9">2 year</dd>

    <dt class="col-sm-3">Delivery time</dt>
    <dd class="col-sm-9">3-4 days</dd>

    <dt class="col-sm-3">Stock</dt>
    <dd class="col-sm-9">{{$stock}}</dd>
  </dl>

      <div class="form-row  mt-4">
          <div class="form-group col-md flex-grow-0">
              <div class="input-group mb-3 input-spinner">
                {{-- <div class="input-group-prepend">
                  <button class="btn btn-light" type="button" id="button-plus"> + </button>
                </div> --}}
                <input type="hidden" class="form-control" value="1">
                {{-- <div class="input-group-append">
                  <button class="btn btn-light" type="hidden" id="button-minus"> - </button>
                </div> --}}
              </div>
          </div> <!-- col.// -->
          <div class="form-group col-md">

            @if ($stock == 'Disponible')
            <form action="{{ route('cart.store') }}" method="POST">
                @csrf
              <input type="hidden" name="product_id" value="{{ $product->id }}">
              {{-- <input type="hidden" name="title" value="{{ $product->title }}">
              <input type="hidden" name="price" value="{{ $product->price }}"> --}}
                  <button type="submit"  class="btn  btn-primary">
                      <i class="fas fa-shopping-cart"></i> <span class="text">Add to cart</span>
                  </button>
                </form>

            @endif

            {{--
              <button type="submit" class="btn btn-light">
          <i class="fas fa-envelope"></i> <span class="text">Contact supplier</span>
              </button> --}}
          </div> <!-- col.// -->
      </div> <!-- row.// -->

  </article> <!-- product-info-aside .// -->
          </main> <!-- col.// -->
      </div> <!-- row.// -->

  <!-- ================ ITEM DETAIL END .// ================= -->


  </div> <!-- container .//  -->
  </section>
  <!-- ========================= SECTION CONTENT END// ========================= -->

  <!-- ========================= SECTION  ========================= -->
  <section class="section-name padding-y bg">
  <div class="container">

  <div class="row">
      <div class="col-md-8">
          <h5 class="title-description">Description</h5>
          <p>
            {{ $product->description }}
          </p>
          <ul class="list-check">
          <li>Material: Stainless steel</li>
          <li>Weight: 82kg</li>
          <li>built-in drip tray</li>
          <li>Open base for pots and pans</li>
          <li>On request available in propane execution</li>
          </ul>

          <h5 class="title-description">Specifications</h5>
          <table class="table table-bordered">
              <tr> <th colspan="2">Basic specs</th> </tr>
              <tr> <td>Type of energy</td><td>Lava stone</td> </tr>
              <tr> <td>Number of zones</td><td>2</td> </tr>
              <tr> <td>Automatic connection	</td> <td> <i class="fa fa-check text-success"></i> Yes </td></tr>

              <tr> <th colspan="2">Dimensions</th> </tr>
              <tr> <td>Width</td><td>500mm</td> </tr>
              <tr> <td>Depth</td><td>400mm</td> </tr>
              <tr> <td>Height	</td><td>700mm</td> </tr>

              <tr> <th colspan="2">Materials</th> </tr>
              <tr> <td>Exterior</td><td>Stainless steel</td> </tr>
              <tr> <td>Interior</td><td>Iron</td> </tr>

              <tr> <th colspan="2">Connections</th> </tr>
              <tr> <td>Heating Type</td><td>Gas</td> </tr>
              <tr> <td>Connected load gas</td><td>15 Kw</td> </tr>

          </table>
      </div> <!-- col.// -->

      <aside class="col-md-4">

          <div class="box">

          <h5 class="title-description">Files</h5>
              <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>

      <h5 class="title-description">Videos</h5>


      <article class="media mb-3">
        <a href="#"><img class="img-sm mr-3" src="images/posts/3.jpg"></a>
        <div class="media-body">
          <h6 class="mt-0"><a href="#">How to use this item</a></h6>
          <p class="mb-2"> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin </p>
        </div>
      </article>

      <article class="media mb-3">
        <a href="#"><img class="img-sm mr-3" src="images/posts/2.jpg"></a>
        <div class="media-body">
          <h6 class="mt-0"><a href="#">New tips and tricks</a></h6>
          <p class="mb-2"> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin </p>
        </div>
      </article>

      <article class="media mb-3">
        <a href="#"><img class="img-sm mr-3" src="images/posts/1.jpg"></a>
        <div class="media-body">
          <h6 class="mt-0"><a href="#">New tips and tricks</a></h6>
          <p class="mb-2"> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin </p>
        </div>
      </article>



      </div> <!-- box.// -->
      </aside> <!-- col.// -->
  </div> <!-- row.// -->

  </div> <!-- container .//  -->
  </section>
  <!-- ========================= SECTION CONTENT END// ========================= -->




  @endsection
