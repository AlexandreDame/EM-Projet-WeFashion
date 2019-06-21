@if(Session::has('message'))
<div class="alert">
    <p style='color:green; font-weight:bold'>{{Session::get('message')}}</p>
</div>
@endif