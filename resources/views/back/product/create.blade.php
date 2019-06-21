@extends('layouts.master')

@section('content')
<div class="container">
  <h1 class="mt-2 text-primary">Ajouter un produit :</h1><hr>
    <div class="row">
      <div class="col-md-6">
        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}

                <div class="form-group">
                  <label for="titleProduct"><strong>Titre :</strong></label>
                  <input type="text" name="title" value="{{old('title')}}" class="form-control" id="titleProduct" placeholder="Titre du produit">
                  @if($errors->has('title')) <span class="error bg-warning ">{{$errors->first('title')}}</span>@endif
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1"><strong>Description :</strong></label>
                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"placeholder="Description">{{old('description')}}</textarea>
                     @if($errors->has('description')) <span class="error bg-warning ">{{$errors->first('description')}}</span> @endif
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1"><strong>Prix :</strong></label>
                    <input name="price" value="{{old('price')}}"type="text" class="form-control" id="exampleFormControlInput1" placeholder="Prix">
                    @if($errors->has('price')) <span class="error bg-warning ">{{$errors->first('price')}}</span>@endif
                </div>
                <div class="form-select">
                  <label for="SelectCat"><strong>Catégorie : </strong></label>
                  <select id="SelectCat" class='select-cat' name="categorie_id" value="">
                    
                    @foreach ($categories as $id => $title)
                    <option {{ old('categorie_id')==$id? 'selected' : '' }} value="{{ $id }}"  >{{ $title }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label class="my-4"><strong>Choisir une/des tailles disponibles :</strong></label>
                    <div>
                    @forelse($sizes as $id => $name)
                    <label class="control-label" for="size{{$id}}">{{ $name }}</label>
                      <input name="sizes[]" id="sizes{{$id}}" value="{{$id}}" {{ ( !empty(old('sizes')) and in_array($id, old('sizes')) )? 'checked' : ''  }} type="checkbox" class="mr-1" id="size{{$id}}">
                    @empty
                    @endforelse
                    </div>
                </div>
                <div class="form-group">
                  <label for="referenceProduct"><strong>Référence produit :</strong></label>
                    <input type="text" name="reference" value="{{old('reference')}}" class="form-control" id="referenceProduct" placeholder="Référence du produit">@if($errors->has('reference')) <span class="error bg-warning">{{$errors->first('reference')}}</span>
                      @endif
                </div>
      </div>
      <div class="col-md-6">              
                <div class="form-group">
                  <label for="statusProduct"><strong>Statut :</strong></label>
                    <div class="col-sm-10">
                      <div class="form-check">
                        <input type="radio" @if(old('status')=='Publié') checked @endif name="status" value="Publié" checked> publier<br>
                        <input type="radio" @if(old('status')=='Brouillon') checked @endif name="status" value="Brouillon" > brouillon<br>
                      </div>
                    </div>
                </div>
                <div class="form-select">
                  <label for="codeProduct"><strong>Code :</strong></label>
                    <select name='code'class='select-size' id="codeProduct">
                      <option  @if(old('code')=='solde') selected @endif value='solde'> Solde </option>
                      <option  @if(old('code')=='standard') selected @endif value='standard'> Standard </option>      
                    </select>
                </div>
                <div class="form-group">
                  <label for="imgProduct"><strong>Image :</strong></label>
                    <input type="file" name="url_image" class="form-control-file" id="imgProduct">
                        @if($errors->has('picture')) <span class="error bg-warning ">{{$errors->first('picture')}}</span> @endif
                </div>
                                              
                <button type="submit" class="btn btn-primary">Ajouter un produit</button>
        </form>
      </div>
    </div>
</div>
@endsection