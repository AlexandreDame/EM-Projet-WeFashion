@extends('layouts.master')

@section('content')

<a class="btn btn-primary mb-4" href="{{ url('admin/categorie/create') }}" role="button">Ajouter catégorie</a>
@include('back.categorie.partials.flash')
<table class="table table-striped">
    <thead>
        <tr class="bg-primary">
            <th>Nom</th>
            <th>Mettre à jour</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
            @forelse($categories as $categorie)
            <tr>
                    <td><a href="{{route('categorie.edit',$categorie->id)}}">{{$categorie->title}}</a></td>
                    <td><a class="btn btn-primary" href="{{route('categorie.edit',$categorie->id)}}">Mettre à jour</a></td>
                    <td>
                        <form class="delete" method="POST" action="{{route('categorie.destroy', $categorie->id)}}">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                            <input class="btn btn-danger" type="submit" value="Supprimer" >
                        </form>
                    </td>
            </tr>
            
            @empty
                aucun produit...
            @endforelse
    </tbody>
</table>

@endsection 

@section('scripts')
    @parent
    <script src="{{asset('js/confirm.js')}}"></script>
@endsection