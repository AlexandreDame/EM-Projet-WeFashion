<div class="mx-3 p-3 mb-2 text-white" id='menu'>
  <h1 class="navbar-brand mb-0 h1" ><a id='title' href="{{url('/')}}">WeFashion</a></h1>

  <nav class="navbar navbar-expand-lg navbar-light">
    <ul id='myDIV' class="navbar-nav mr-auto">
             
      <li class="nav-item">
          <a class="nav-link" href="{{url('solde', $product->id)}}">Soldes</a>
        </li>
        @forelse($categories as $id => $title)
      <li class="nav-item">
          <a class="nav-link" href="{{url('categorie', $id)}}">{{$title}}</a>
      </li>
      @empty 
      <li>Aucune catégorie pour l'instant</li>
      @endforelse
    </ul>                 
    
    <ul class="nav navbar-nav ml-auto ">      
      @if(Auth::check())
      <li class="nav-item">
           <a href="{{route('product.index')}}"><small>Espace Admin</small></a>
      </li>
      @endif
    </ul>   
  </nav>
</div>
