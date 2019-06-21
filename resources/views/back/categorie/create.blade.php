@extends('layouts.master')

@section('content')
<div class="container">
  <h1 class="mt-2 text-primary">Ajouter une catégorie :</h1><hr>
    <div class="row">
      <div class="col-md-6">
        <form action="{{route('categorie.store')}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
                
                <div class="form-group">
                  <label for="titleCat"><strong>Titre :</strong></label>
                  <input type="text" name="title" value="{{old('title')}}" class="form-control" id="titleCat" placeholder="Titre de la catégorie">
                  @if($errors->has('title')) <span class="error bg-warning ">{{$errors->first('title')}}</span>@endif
                </div>
                
                                              
                <button type="submit" class="btn btn-primary">Ajouter catégorie</button>
        </form>
      </div>
    </div>
</div>
@endsection