{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.store')

@section('store')

<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg-gray">
    <div class="container">
        <h2 class="title-page">My account</h2>
    </div> <!-- container //  -->
    </section>
    <!-- ========================= SECTION PAGETOP END// ========================= -->

    <!-- ========================= SECTION CONTENT ========================= -->
    <section class="section-content padding-y">
    <div class="container">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">

        @include('partials.menu')

        <main class="col-md-9">

            <article class="card mb-3">
                <div class="card-body">

                    <figure class="icontext">
                            <div class="icon">
                                <img class="rounded-circle img-sm border" src="images/avatars/avatar3.jpg">
                            </div>
                            <div class="text">
                                <strong> {{ Auth::user()->first_name }} {{ Auth::user()->name }} </strong> <br>
                                <p class="mb-2"> {{ Auth::user()->email }}  </p>
                                <a href="#" class="btn btn-light btn-sm">Edit</a>
                            </div>
                    </figure>
                    <hr>
                    <p>
                        <i class="fa fa-map-marker text-muted"></i> &nbsp; My address:
                         <br>
                        Tashkent city, Street name, Building 123, House 321 &nbsp
                        <a href="#" class="btn-link"> Edit</a>
                    </p>



                    <article class="card-group card-stat">
                        <figure class="card bg">
                            <div class="p-3">
                                 <h4 class="title">38</h4>
                                <span>Orders</span>
                            </div>
                        </figure>
                        <figure class="card bg">
                            <div class="p-3">
                                 <h4 class="title">5</h4>
                                <span>Wishlists</span>
                            </div>
                        </figure>
                        <figure class="card bg">
                            <div class="p-3">
                                 <h4 class="title">12</h4>
                                <span>Awaiting delivery</span>
                            </div>
                        </figure>
                        <figure class="card bg">
                            <div class="p-3">
                                 <h4 class="title">50</h4>
                                <span>Delivered items</span>
                            </div>
                        </figure>
                    </article>


                </div> <!-- card-body .// -->
            </article> <!-- card.// -->

            <article class="card  mb-3">
                <div class="card-body">
                    <h5 class="card-title mb-4">Recent orders </h5>

                    <div class="row">
                    <div class="col-md-6">
                        <figure class="itemside  mb-3">
                            <div class="aside"><img src="images/items/1.jpg" class="border img-sm"></div>
                            <figcaption class="info">
                                <time class="text-muted"><i class="fa fa-calendar-alt"></i> 12.09.2019</time>
                                <p>Great book name goes here </p>
                                <span class="text-success">Order confirmed </span>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->
                    <div class="col-md-6">
                        <figure class="itemside  mb-3">
                            <div class="aside"><img src="images/items/2.jpg" class="border img-sm"></div>
                            <figcaption class="info">
                                <time class="text-muted"><i class="fa fa-calendar-alt"></i> 12.09.2019</time>
                                <p>How to be rich</p>
                                <span class="text-success">Departured</span>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->
                    <div class="col-md-6">
                        <figure class="itemside mb-3">
                            <div class="aside"><img src="images/items/3.jpg" class="border img-sm"></div>
                            <figcaption class="info">
                                <time class="text-muted"><i class="fa fa-calendar-alt"></i> 12.09.2019</time>
                                <p>Harry Potter book </p>
                                <span class="text-success">Shipped  </span>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->
                </div> <!-- row.// -->

                <a href="#" class="btn btn-outline-primary btn-block"> See all orders <i class="fa fa-chevron-down"></i>  </a>
                </div> <!-- card-body .// -->
            </article> <!-- card.// -->

        </main> <!-- col.// -->
    </div>

    </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->
    @endsection

