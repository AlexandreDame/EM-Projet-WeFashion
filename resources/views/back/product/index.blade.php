@extends('layouts.master')

@section('content')
{{$products->links()}}
<a class="btn btn-primary mb-4" href="{{ url('admin/product/create') }}" role="button">Nouveau produit</a>
@include('back.product.partials.flash')
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Catégorie</th>
            <th>Prix</th>
            <th>Statut</th>
            <th>Mettre à jour</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
            @forelse($products as $product)
            <tr>
                    <td><a href="{{route('product.edit', $product->id)}}">{{$product->title}}</a></td>
                    <td>{{$product->categorie->title?? 'aucune catégorie' }}</td>
                    <td>{{$product->price}}</td>
                    <td > @if($product->status == 'Publié')
                        <span style='color:green'>Publié</bspan>
                        @else 
                        <span style='color:red'>Brouillon</span>
                        @endif</td>
                    <td><a class="btn btn-primary" href="{{route('product.edit', $product->id)}}">Mettre à jour</a></td>
                    <td>
                            <form class="delete" method="POST" action="{{route('product.destroy', $product->id)}}">
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