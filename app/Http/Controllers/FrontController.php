<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product; 
use App\Categorie;
use Cache;


class FrontController extends Controller
{
    protected $paginate = 6;

    public function __construct(){

        view()->composer('partials.menu', function($view){
            $categories = Categorie::pluck('title', 'id')->all(); 
            $view->with('categories', $categories ); 
        });
    }

    public function index(){
        $products = Product::published()->orderBy('created_at', 'desc')->paginate($this->paginate);
        $count = Product::published()->count();

        return view('front.index', ['products' => $products, 'count' => $count]);

    }
    public function show(int $id){

        
        $product = Product::find($id);

        
        return view('front.show', ['product' => $product]);
    }
    public function showProductByCat(int $id){
        
        $categorie= Categorie::find($id);
        $product = Product::find($id);
        
        $products = $categorie->products()->published()->paginate($this->paginate);
        $count = $categorie->products()->published()->count();

        return view('front.categorie', ['products' => $products, 'categorie' => $categorie, 'count' => $count]);
    }
    public function showProductByCode(int $id){
        
        $product= Product::find($id)->where('code', 'Solde');

        $products = $product->published()->paginate($this->paginate);

        $count = $product->published()->count();

        return view('front.solde', ['products' => $products, 'count' => $count]);
    }
}
