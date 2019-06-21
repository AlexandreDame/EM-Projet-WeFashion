<div class="mx-3 p-3 mb-2 text-white" id='menu'>
  <h1 class="navbar-brand mb-0 h1" ><a id='title'>WeFashion</a></h1>

  <nav class="navbar navbar-expand-lg navbar-light">
  
    <ul id='myDIV' class="navbar-nav mr-auto">
      <li class="nav-item">    
          <a class="nav-link" href="{{route('product.index')}}">PRODUITS</a>
      </li>
      <li class="nav-item">    
          <a class="nav-link" href="{{route('categorie.index')}}">CATEGORIES</a>
      </li>
      
    </ul>
    <ul class="nav navbar-nav ml-auto ">      
      <li class="nav-item ">
          <a class="nav-link nav-link btn btn-primary" href="{{url('/')}}" title="Voir le site"><i class="far fa-eye"></i></a>
      </li>
      <li class="nav-item">
          <a class="nav-link nav-link btn btn-success ml-3 mb-4" title="Se déconnecter" href="{{route('logout')}}"
              onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i></a>
      </li>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{csrf_field() }}
      </form>
    </ul>   
  </nav>
</div>