@extends('layouts.store')

@section('extra-meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('store')


<!-- ========================= SECTION CONTENT ========================= -->
   @if( Cart::count() > 0 )
   <section class="section-content padding-y">
    <div class="container">

    <div class="row">
        <main class="col-md-9 shadow-lg">
    <div class="card">

    <table class="table table-borderless table-shopping-cart">
    <thead class="text-muted">
    <tr class="small text-uppercase">
      <th scope="col">Product</th>
      <th scope="col" width="120">Quantity</th>
      <th scope="col" width="120">Price</th>
      <th scope="col" class="text-right" width="200"> </th>
    </tr>
    </thead>
    <tbody>
      @foreach (Cart::content() as $product)
    <tr>
        <td>
            <figure class="itemside">
                <div class="aside"><img src="{{ $product->model->image1 }}" class="img-sm"></div>
                <figcaption class="info">
                    <a href="{{ route('products.show', $product->model->slug) }}" class="title text-dark">{{ $product->model->title}}</a>
                    <p class="text-muted small">Size: XL, Color: blue, <br> Brand: Gucci</p>
                </figcaption>
            </figure>
        </td>
        <td>
        <select name"qty" id="qty" data-id="{{ $product->rowId }}" data-stock=" {{$product->model->stock}} " class="form-control">
               @for ($i = 1; $i <= 6; $i++)
            <option value="{{ $i}}" {{ $i == $product->qty ? 'selected' : '' }} >{{ $i}}</option>
               @endfor
            </select>
            {{-- <input type="number" name="qty" class="form-control" value=""> --}}
        </td>
        <td>
            <div class="price-wrap">
                <var class="price">{{ getPrice($product->subtotal()) }}</var>
                <small class="text-muted"> $315.20 each </small>
            </div> <!-- price-wrap .// -->
        </td>
        <td class="text-right">
        {{-- <a data-original-title="Save to Wishlist" title="" href="" class="btn btn-light" data-toggle="tooltip"> <i class="fa fa-heart"></i></a>  --}}
        <form action="{{ route('cart.destroy', $product->rowId) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-primary"> <i class="fa fa-trash"></i> Remove</button>
        </form>
        </td>
    </tr>
      @endforeach

    </tbody>
    </table>

    <div class="card-body border-top">
        <a href="{{ route('checkout.index') }}" class="btn btn-primary float-md-right"> Make Purchase <i class="fa fa-chevron-right"></i> </a>
        <a href="{{ route('products.index') }}" class="btn btn-light"> <i class="fa fa-chevron-left"></i> Continue shopping </a>
    </div>
    </div> <!-- card.// -->

    <div class="alert alert-success mt-3">
        <p class="icontext"><i class="icon text-success fa fa-truck"></i> Free Delivery within 1-2 weeks</p>
    </div>

        </main> <!-- col.// -->
        <aside class="col-md-3">
            <div class="card mb-3">
                @if (!request()->session()->has('coupon'))
                <div class="card-body shadow-lg">
                    <form action="{{route('cart.store.coupon')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Have coupon?</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="code" placeholder="Coupon code">
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Apply</button>
                                </span>
                            </div>
                        </div>
                    </form>
                    </div> <!-- card-body.// -->
                   @else
                 <div class="card mb-3">
                    <div class="alert alert-success" role="alert">
                    <p> Un coupon est déjà appliqué <i class="icon text-success fa fa-check"></i></p>
                    </div>
                 </div>

                @endif
            </div>  <!-- card .// -->
            <div class="card">
                <div class="card-body shadow-lg">
                        <dl class="dlist-align">
                          <dt>Sub Total:</dt>
                          <dd class="text-right">{{ getPrice(Cart::subtotal()) }} </dd>
                        </dl>
                       @if (request()->session()->has('coupon'))
                       <dl class="dlist-align">
                        <dt>Coupon {{request()->session()->get('coupon')['code']}}:</dt>

                        <form action="{{route('cart.destroy.coupon')}}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
                        </form>
                        <dd class="text-right">{{getPrice(request()->session()->get('coupon')['remise'])}}</dd>
                      </dl>

                      <dl class="dlist-align">
                        <dt>New Sub Total:</dt>
                        <dd class="text-right"> {{ getPrice(Cart::subtotal() - request()->session()->get('coupon')['remise'] )}} </dd>
                      </dl>

                      <dl class="dlist-align">
                        <dt>Taxe:</dt>
                        <dd class="text-right"> {{ getPrice((Cart::subtotal() - request()->session()->get('coupon')['remise']) * (config('cart.tax') / 100)) }}</dd>
                      </dl>

                      <dl class="dlist-align">
                        <dt>New Total:</dt>
                        <dd class="text-right h5"><strong>{{ getPrice( (Cart::subtotal() - request()->session()->get('coupon')['remise']) + (Cart::subtotal() - request()->session()->get('coupon')['remise']) * (config('cart.tax') / 100)) }}</strong></dd>
                        </dl>
                       @else
                        <dl class="dlist-align">
                            <dt>Taxe:</dt>
                            <dd class="text-right">{{ getPrice(Cart::tax()) }}</dd>
                          </dl>
                        <dl class="dlist-align">
                          <dt>Total:</dt>
                          <dd class="text-right  h5"><strong>{{ getPrice(Cart::total()) }}</strong></dd>
                        </dl>
                        @endif
                        <hr>
                        <p class="text-center mb-3">
                            <img src="{{asset('img/site/payments.png')}}" height="26">
                        </p>

                </div> <!-- card-body.// -->
            </div>  <!-- card .// -->
        </aside> <!-- col.// -->
    </div>

    </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->

    <!-- ========================= SECTION  ========================= -->
    <section class="section-name border-top padding-y">
    <div class="container">
    <h6>Payment and refund policy</h6>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    </div><!-- container // -->
    </section>

    @else
    <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading">Désolé votre panier est vide</h4>
        <p>Il serait préferable de retouner sur la boutique pour éffectuer un achat en vue de remplire votre panier</p>
        <hr>
        <p class="mb-0"><a href=" {{ route('products.index') }}" class="">Aller à la boutique</a></p>
      </div>
   @endif
    <!-- ========================= SECTION  END// ========================= -->

    @endsection
    @section('extra-js')
    <script>
       var selects = document.querySelectorAll('#qty');
       Array.from(selects).forEach((element) => {
           element.addEventListener('change', function () {
               var rowId = this.getAttribute('data-id');
               var stock = this.getAttribute('data-stock');
               var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            //    console.log(token);
               fetch(
                   `/panier/${rowId}`,
                   {
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json, text-plain, */*",
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-TOKEN": token
                        },
                        method: 'post',
                        body: JSON.stringify({
                            qty: this.value,
                            stock: stock
                    })
                }
              ).then((data) => {
                  console.log(data);
                  location.reload();
              }).catch((error) => {
                  console.log(error)
              })
           });
       });
    </script>

    @endsection
