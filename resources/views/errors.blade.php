

@foreach($errors->all() as $error)

    <div class="alert alert-danger" role="alert">
        {{  $error }}
    </div>
@endforeach

@if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">
        {{ Session::get('message') }}
    </p>
@endif
