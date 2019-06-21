@extends('layouts.master')

@section('content')
<div class="container">
  <h1 class="mt-2 text-primary">Modifier une catégorie :  </h1><hr>
      <div class="row">
          <div class="col-md-6">
          <form action="{{route('categorie.update', $categorie->id)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{method_field('PUT')}} 
                <div class="form-group">
                  <label for="exampleFormControlInput1"><strong>Titre :</strong></label>
                  <input type="text" name="title" value="{{$categorie->title}}" class="form-control" id="exampleFormControlInput1" placeholder="Titre du produit">
                  @if($errors->has('title')) <span class="error bg-warning">{{$errors->first('title')}}</span>@endif
                </div>
                
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
          </form>
          </div>
      </div>
</div>
@endsection