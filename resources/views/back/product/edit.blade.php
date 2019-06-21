@extends('layouts.master')

@section('content')
<div class="container">
  <h1 class="mt-2 text-primary">Modifier un produit :  </h1><hr>
      <div class="row">
          <div class="col-md-6">
          <form action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{method_field('PUT')}} 
                <div class="form-group">
                  <label for="exampleFormControlInput1"><strong>Titre :</strong></label>
                  <input type="text" name="title" value="{{$product->title}}" class="form-control" id="exampleFormControlInput1" placeholder="Titre du produit">
                  @if($errors->has('title')) <span class="error bg-warning">{{$errors->first('title')}}</span>@endif
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1"><strong>Description :</strong></label>
                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"placeholder="Description">{{$product->description}}</textarea>
                     @if($errors->has('description')) <span class="error bg-warning">{{$errors->first('description')}}</span> @endif
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1"><strong>Prix :</strong></label>
                    <input name="price" value="{{$product->price}}"type="text" class="form-control" id="exampleFormControlInput1" placeholder="Prix">
                    @if($errors->has('price')) <span class="error bg-warning">{{$errors->first('price')}}</span>@endif
                </div>
                <div class="form-select">
                  <label for="SelectCat"><strong>Catégorie : </strong></label>
                  <select id="SelectCat" class='select-size' name="categorie_id" value="">
                    <option value="0" {{is_null($product->categorie)? 'selected' : ''}} >Pas de catégorie
                    </option>
                    @foreach ($categories as $id => $title)
                    <option {{ (!is_null($product->categorie) and $product->categorie->id == $id)? 'selected' : '' }}   value="{{ $id }}"  >{{ $title }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label class="my-4"><strong>Choisir une/des tailles disponibles :</strong></label>
                  <div>
                    @forelse($sizes as $id => $name)
                    <label class="control-label" for="size{{$id}}">{{ $name }}</label>
                    <input class="mr-1" id="size{{$id}}" type="checkbox" name="sizes[]" id="sizes{{$id}}"  @if(in_array($id, $product->size()->pluck('id')->all())) checked @endif  value="{{$id}}">
                    @empty
                    @endforelse
                  </div>
                </div>
                <div class="form-group">
                        <label for="exampleFormControlInput1"><strong>Référence produit :</strong></label>
                              <input type="text" name="reference" value="{{$product->reference}}" class="form-control" id="exampleFormControlInput1" placeholder="Référence du produit">
                              @if($errors->has('reference')) <span class="error bg-warning">{{$errors->first('reference')}}</span>@endif
                </div>
                
        </div>
        <div class="col-md-6"> 
                <div class="form-group">                                    
                        <label for="exampleFormControlInput1"><strong>Statut :</strong></label>
                              <div class="col-sm-10">                                           
                                    <div class="form-check">
                                      <input type="radio" @if($product->status == 'Publié') checked @endif name="status" value="Publié" checked>Publier<br>
                                      <input type="radio" @if($product->status == 'Brouillon') checked @endif name="status" value="Brouillon" > Brouillon<br>
                                    </div>                                    
                              </div>
                </div>
                <div class="form-select">
                        <label class="mb-4"><strong>Code :</strong></label>
                              <select name='code'class='select-size' id="inlineFormCustomSelectPref">
                                <option  @if($product->code == 'solde') selected @endif value='solde'> Solde </option>
                                <option  @if($product->code == 'standard') selected @endif value='standard'> Standard </option>                                  
                              </select>
                </div>
                <div class="form-group">
                      <label for="exampleFormControlFile1"><strong>Image</strong></label>
                        <input type="file" name="picture" class="form-control-file" id="exampleFormControlFile1">
                        @if($errors->has('picture')) <span class="error bg-warning">{{$errors->first('picture')}}</span> @endif
                </div>
                @if($product->url_image)
                <div class="form-group">
                        <h6><strong>Image associée :</strong><h6>
                              <img width="200" src="{{url('images', $product->url_image)}}" alt="">
                </div>
                @endif
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
          </form>
          </div>
      </div>
</div>
@endsection