<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductController extends Controller
{
   Public function index(){

    if(request()->categorie)
    $products = Product::with('categories')->whereHas('categories', function($query) {
           $query->where('slug', request()->categorie);
       })->orderBy('created_at', 'DESC')->paginate(12);
   else {
        $products = Product::with('categories')->paginate(12);

    }
      //  dd($products);

      return view('products.index')->with('products', $products);
   }


   Public function list(){

    if(request()->categorie)
    $products = Product::with('categories')->whereHas('categories', function($query) {
           $query->where('slug', request()->categorie);
       })->paginate(12);
   else {
        $products = Product::with('categories')->paginate(12);

    }
      //  dd($products);

       return view('products.list')->with('products', $products);
   }


   Public function welcome(){
    //    dd(Cart::content());
       $products = Product::InRandomOrder()->take(12)->get();
      //  dd($products);

       return view('welcome')->with('products', $products);
   }



   public function show($slug){
       $product = Product::where('slug', $slug)->first();
    $stock = $product->stock == 0 ? 'Indisponible' : 'Disponible';
       return view('products.show', [
          'product' => $product,
          'stock' => $stock

       ]);
   }

   public function search()
   {
       request()->validate([
           'q' => 'required|min:3'
       ]);

      $q = request()->input('q');

      $products = Product::where('title', 'like', "%$q%")
             ->orWhere('description', 'like', "%$q%")
             ->paginate(8);

         return view('products.search')->with('products', $products);

   }
}
