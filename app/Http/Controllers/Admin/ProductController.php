<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\User;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(5);
        return view('admin.product.index',compact('products') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }
    public function store(Request $request)
    {
        $data = array();
        $data['title'] = $request->title;
        $data['slug'] = $request->slug;
        $data['subtitle'] = $request->subtitle;
        $data['description'] = $request->description;
        $data['price'] = $request->price;
        $data['stock'] = $request->stock;
        $data['image1'] = $request->image1;
        $data['image2'] = $request->image2;
        $data['image3'] = $request->image3;
        $data['image4'] = $request->image4;
        $products = Product::inser($data);
        return redirect()->route('admin.product.index')
                         ->with('success', 'Produit ajouter avec succes');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Product::where('id',$id)->first();
        return view('admin.product.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::findOrFail($id);
         return view('admin.product.edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array();
        $data['title'] = $request->title;
        $data['slug'] = $request->slug;
        $data['subtitle'] = $request->subtitle;
        $data['description'] = $request->description;
        $data['price'] = $request->price;
        $data['stock'] = $request->stock;
        $data['image1'] = $request->image1;
        $data['image2'] = $request->image2;
        $data['image3'] = $request->image3;
        $data['image4'] = $request->image4;
        $products = Product::where('id',$id)->update($data);
        return redirect()->route('admin.product.index')
                         ->with('success', 'Produit a été mis à jour avec succes');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::where('id',$id)->first();
        $products = Product::where('id',$id)->delete();
        return redirect()->route('admin.product.index')
                        ->with('success', 'Produit supprimé avec succes');
    }

}
