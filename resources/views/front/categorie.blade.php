@extends('layouts.master')

@section('content')
<small><a href= '{{url('/')}}'> Boutique WeFashion</a>> {{$categorie->title?? 'aucune catégorie'}}</small>
{{$products->links()}}
<p class="text-right pr-2"><strong>Catégorie {{$categorie->title}} : {{$count}} résultats</strong></p>
<div class="row">
  @forelse($products as $product)
  <div class="card col-3"><a href="{{url('product', $product->id)}}">

        <img src="{{asset('images/'.$product->url_image)}}" class="card-img-top" alt="{{$product->title}}">

    <div class="card-body">
        <h5 class="card-title"><a href="{{url('product', $product->id)}}">{{$product->title}}</a>@if ($product->code === 'Solde')
          <span class="alertSale"> -20% </span>
          @endif
        </h5>

          <p class="card-text"><small class="text-muted textBold">{{$product->code}} </small></p>

          @if ($product->code === 'Solde')
          
          <p class="card-text line" style="color:red;"><small class="text-muted">Prix : {{$product->price}} €</small></p>
          <span class="textBold" style='color:green;'> @php echo number_format($product->price*0.8, 2)@endphp € </span>
          
          @else 
          <p class="card-text"><small class="text-muted textBold">Prix : {{$product->price}} €</small></p>
          @endif
          <p class="card-text">Vêtement pour {{$categorie->title}}</p>
    </div>
  </div>
  @empty
          <p>Désolé pour l'instant aucun produit n'est publié sur le site</p>
  @endforelse
</div>
<p class="text-right">{{$products->links()}}</p> 
@endsection 