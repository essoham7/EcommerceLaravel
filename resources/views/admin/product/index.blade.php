@extends('layouts.admin_master')

@section('admin')


    <section class="content">
        <div class="container-fluid">

            <!-- Striped Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               LES PRODUITS
                                {{-- <small>Use <code>.table-striped</code> to add zebra-striping to any table row within the <code>&lt;tbody&gt;</code></small> --}}
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>title</th>
                                        <th>slug</th>
                                        <th>subtitle</th>
                                        <th>description</th>
                                        <th>price</th>
                                        <th>image1</th>
                                        <th>image2</th>
                                        <th>image3</th>
                                        <th>image4</th>
                                        <th>Action</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach($products as $product )
                                    <tr>
                                        <th scope="row">{{$product->id  }}</th>
                                        <td>{{$product->title  }}</td>
                                        <td>{{$product->slug  }}</td>
                                        <td>{{$product->subtitle  }}</td>
                                        <td>{{$product->description  }}</td>
                                        <td>{{ getPrice($product->price)  }}</td>
                                        <td>{{$product->image1  }}</td>
                                        <td>{{$product->image2  }}</td>
                                        <td>{{$product->image3  }}</td>
                                        <td>{{$product->image4  }}</td>
                                        <td>
                                            <a class="btn btn-info" href="#"> show</a>
                                            <a class="btn btn-primary" href=" {{ URL::to('admin/edit/product/'.$product->id) }}"> Edit</a>
                                            <a class="btn btn-danger" href="#" onclick ="return confirm('Etes vous sure de vouloir supprimer')"> Delete</a>

                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>

                            {!! $products->links() !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Striped Rows -->



        </div>
    </section>

    @endsection
