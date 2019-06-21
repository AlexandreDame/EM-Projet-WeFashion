<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>We Fashion</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"
        crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 ">
            @if(Request::is('admin/*'))
                @include('partials.menuAdmin')
            @else
                @include('partials.menu')
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 px-3">
            @yield('content')
        </div>
    </div>
    <footer class="mainfooter container-fluid" role="contentinfo">
        @include('partials.footer')
    </footer>
</div>
@section('scripts')
<script src="{{asset('js/app.js')}}"></script>
@show
</body>
</html>
