@extends('layout')


@section('content')

    <div class="box">
        <div class="box-body">
            <h3> {{ $user->username }}</h3>

            <h4> Er hat interresse an den Filmen:
            @foreach($user->movies as $movie)
                <br>
                    - {{ $movie->titel }}

                @endforeach

            </h4>
            <h4> AdminStatus: <?=  ($user->admin == '1') ? 'Ist Admin' : 'ist kein Admin' ?></h4>
            @if( auth()->user()->admin == '1')


            <form method="POST" action="/user/{{ $user->id }}">
                @csrf
                @method('PATCH')
                <button class="btn btn-danger"> Adminstatus ändern!</button>
            </form>
            @endif
            <br>
            @if($user->id == auth()->user()->id)
                <div class="box  box-primary">

                    <div class="box-header ">

                    </div>

                    <div class="box-body">
                        <form method="POST" action="/user/password">
                            <input type="hidden" value="{{ $user->id }}" name="user_id">
                            @csrf
                            <br>




                                <div class="form-group">
                                    <input type="password" name="password" placeholder="Neues Passwort" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="passwordAgain" placeholder="Passwort wiederholen" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-success">Ändern</button>



                        </form>
                    </div>
                </div>
             @endif




        </div>
    </div>

@endsection
