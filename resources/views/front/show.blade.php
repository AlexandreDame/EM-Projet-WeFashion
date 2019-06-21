@extends('layouts.master')

@section('content')
<div class="container">
        <div class="row">
          
          <div class="col-md-6 offset-md-2">
                <div class="text-left">
                        <img src="{{asset('images/'.$product->url_image)}}" class="rounded" width='350'alt="{{$product->title}}">
                      </div>
          </div>
          <div class="col-md-4 mt-4">
            <h2 class="card-text"><strong>{{$product->title}}</strong></h2>
               @if ($product->code === 'Solde')
              <small class="alertSale">-20%</small>
              @endif
              <p><small class="text-muted">Réf.{{$product->reference}}</small></p>

            <h4>Description :</h4>
              <p>{{$product->description}}</p>

              @if ($product->code === 'Solde')
              <h4 class="card-text text-muted line">Prix : {{$product->price}} € 
              </h4>
            <h4 class="textBold" style='color:#66EB9A;'> @php echo number_format($product->price*0.8, 2)@endphp €</h4>
            @else 
              <h4 class="card-text text-muted textBold">Prix : {{$product->price}} €</h4>
            @endif
                <form class="form-inline">
                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                    <option value="default">Taille</option>
                       @forelse($product->size as $product)
                            <option value="{{$product->name}}">{{$product->name}}</option>
                        @empty
                        @endforelse
                    </select>
                </form>
                <div class="mt-4">
                <a class=" btn btn-success rounded py-2 text-white text-center" href="#" >Ajouter au panier</a>
                </div>
          </div>
        </div>
</div>
@endsection