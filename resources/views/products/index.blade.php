@extends('layouts.store')

@section('store')




<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
    <div class="container">


    <!-- ============================  FILTER TOP  ================================= -->
    <div class="card mb-3">
        <div class="card-body">
    <div class="row">
        <div class="col-md-2"> Your are here: </div> <!-- col.// -->
        <nav class="col-md-8">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Category name</a></li>
            <li class="breadcrumb-item"><a href="#">Sub category</a></li>
            <li class="breadcrumb-item active" aria-current="page">Items</li>
        </ol>
        </nav> <!-- col.// -->
    </div> <!-- row.// -->
    <hr>
    <div class="row">
        <div class="col-md-2">Filter by</div> <!-- col.// -->
        <div class="col-md-10">
            <ul class="list-inline">
              <li class="list-inline-item mr-3 dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">   Supplier type </a>
                <div class="dropdown-menu p-3" style="max-width:400px;">
                  <label class="form-check">
                       <input type="radio" name="myfilter" class="form-check-input"> Good supplier
                  </label>
                  <label class="form-check">
                       <input type="radio" name="myfilter" class="form-check-input"> Best supplier
                  </label>
                  <label class="form-check">
                       <input type="radio" name="myfilter" class="form-check-input"> New supplier
                  </label>
                </div> <!-- dropdown-menu.// -->
              </li>
              <li class="list-inline-item mr-3 dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">  Country </a>
                <div class="dropdown-menu p-3">
                  <label class="form-check"> 	 <input type="checkbox" class="form-check-input"> China    </label>
                  <label class="form-check">   	 <input type="checkbox" class="form-check-input"> Japan      </label>
                  <label class="form-check">    <input type="checkbox" class="form-check-input"> Uzbekistan  </label>
                  <label class="form-check">  <input type="checkbox" class="form-check-input"> Russia     </label>
                </div> <!-- dropdown-menu.// -->
              </li>
              <li class="list-inline-item mr-3 dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Feature</a>
                  <div class="dropdown-menu">
                      <a href="" class="dropdown-item">Anti backterial</a>
                      <a href="" class="dropdown-item">With buttons</a>
                      <a href="" class="dropdown-item">Extra safety</a>
                  </div>
              </li>
              <li class="list-inline-item mr-3"><a href="#">Color</a></li>
              <li class="list-inline-item mr-3"><a href="#">Size</a></li>
              <li class="list-inline-item mr-3">
                  <div class="form-inline">
                      <label class="mr-2">Price</label>
                    <input class="form-control form-control-sm" placeholder="Min" type="number">
                        <span class="px-2"> - </span>
                    <input class="form-control form-control-sm" placeholder="Max" type="number">
                    <button type="submit" class="btn btn-sm btn-light ml-2">Ok</button>
                </div>
              </li>
              <li class="list-inline-item mr-3">
                  <label class="custom-control mt-1 custom-checkbox">
                  <input type="checkbox" class="custom-control-input">
                  <div class="custom-control-label">Ready to ship
                  </div>
                </label>
              </li>
            </ul>
        </div> <!-- col.// -->
    </div> <!-- row.// -->
        </div> <!-- card-body .// -->
    </div> <!-- card.// -->
    <!-- ============================ FILTER TOP END.// ================================= -->

    <header class="mb-3">
            <div class="form-inline">
                <strong class="mr-md-auto">{{ $products->count() }} {{ $products->count() <= 1  ? 'Produit trouvé' : 'Produits trouvés' }}</strong>
                <select class="mr-2 form-control">
                    <option>Latest items</option>
                    <option>Trending</option>
                    <option>Most Popular</option>
                    <option>Cheapest</option>
                </select>
                <div class="btn-group">
                    <a href="{{route('products.list')}}" class="btn btn-light active" data-toggle="tooltip" title="List view">
                        <i class="fa fa-bars"></i></a>
                    <a href="" class="btn btn-light" data-toggle="tooltip" title="Grid view">
                        <i class="fa fa-th"></i></a>
                </div>
            </div>
    </header><!-- sect-heading -->

    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-3">
            <figure class="card card-product-grid">
                <div class="img-wrap">
                    <span class="badge badge-danger"> NEW </span>
                    <img src="{{ $product->image1 }}">
                </div> <!-- img-wrap.// -->
                <figcaption class="info-wrap">
                        <a href="{{ route('products.show', $product->slug) }}" class="title mb-2">{{ $product->title }}</a>
                        <div class="price-wrap">
                            <span class="price">{{ $product->getPrice() }}</span>
                            <small class="text-muted">/per bag</small>
                        </div> <!-- price-wrap.// -->

                        <p class="mb-2"> 2 Pieces  <small class="text-muted">(Min Order)</small></p>
                        <p class="text-muted ">
                          @foreach ($product->categories as $category)
                           {{ $category->name }}

                          @endforeach

                        </p>

                        <p class="text-muted ">Guangzhou Yichuang | Electronic Co</p>

                        <hr>

                        <p class="mb-3">
                            <span class="tag"> <i class="fa fa-check"></i> Verified</span>
                            <span class="tag"> 4 Years </span>
                            <span class="tag"> 60 reviews </span>
                            <span class="tag"> China </span>
                        </p>

                        <label class="custom-control mb-3 custom-checkbox">
                          <input type="checkbox" class="custom-control-input">
                          <div class="custom-control-label">Add to compare
                          </div>
                        </label>

                        <a href="{{ route('products.show', $product->slug) }}" class="btn btn-outline-primary"> <i class="fa fa-shopping-cart"></i> Voir le produit </a>

                </figcaption>
            </figure>
        </div> <!-- col.// -->
        @endforeach

    </div> <!-- row end.// -->

    {{ $products->appends(request()->input())->links() }}

  <br/>

    {{-- <nav class="mb-4" aria-label="Page navigation sample">
      <ul class="pagination">
        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">4</a></li>
        <li class="page-item"><a class="page-link" href="#">5</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </nav> --}}


    <div class="box text-center">
        <p>Did you find what you were looking for？</p>
        <a href="" class="btn btn-light">Yes</a>
        <a href="" class="btn btn-light">No</a>
    </div>

    </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->




@endsection
