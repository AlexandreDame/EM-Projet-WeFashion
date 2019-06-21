<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Product;
use App\Size;
use Storage;

class ProductController extends Controller
{
    protected $paginate = 15;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate($this->paginate);
        
        

        return view('back.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        {
            $categories = Categorie::pluck('title', 'id')->all();
            $sizes = Size::pluck('name','id')->all();

            return view('back.product.create', ['categories' => $categories, 'sizes'=>$sizes]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
            'categorie_id' => 'integer',
            'sizes.*' =>'integer',
            'url_image' => 'image|max:3000',
            'code' => 'in:standard,solde', 
            'price' => 'required|numeric',
            'reference' => 'required|alpha_num',         
        ]);
        
        $file = $request->file('url_image');
        
        if(!empty($file)){
            $file->store('imgUpLoad');
        }
        
        $img = $request->url_image->hashName();
        
        $datas = $request->all();
        $datas['url_image'] =  'imgUpLoad/' . $img; 
        
        $product = Product::create($datas);
        $product->size()->attach($request->sizes);
        

        return redirect()->route('product.index')->with('message', 'Nouveau produit créé avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

         return view('back.product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Categorie::pluck('title', 'id')->all();
        $sizes = Size::pluck('name', 'id')->all();


        return view('back.product.edit', compact('product', 'categories','sizes'));
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
        $this->validate($request, [
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'categorie_id' => 'integer',
            'sizes.*' =>'integer',
            'url_image' => 'image|max:3000',
            'code' => 'in:standard,solde',
            'price' => 'required|numeric',
            'reference' => 'required|alpha_num',
             
        ]);


        $product = Product::find($id);
        $product->update($request->all());
        $product->size()->sync($request->sizes);

        $im = $request->file('picture');
        if (!empty($im)) {
            
            $link = $request->file('picture')->store('images');
            
            
            $product->update([
                'url_image' => $link,
            ]);
        }

        return redirect()->route('product.index')->with('message', 'Succès de la mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->route('product.index')->with('message', 'Produit supprimé');
    }
}

