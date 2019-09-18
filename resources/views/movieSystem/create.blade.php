@extends('layout')

@section('content')

    <div class="box">
        <div class="box-header">
            <div class="box-title">Film hinzufügen</div>
        </div>

        <div class="box-body">
            <form method="POST" action="/movie/search">
                @csrf
                <div class="form-group">
                    <label>Filmname: </label>
                    <input name="movieTitle" class="form-control">
                </div>


                <button class="btn btn-success">Suchen</button>
            </form>
        </div>
    </div>

    @isset($movie)
        <br>
        <div class="box box-success">
            <div class="box-header ">
                <div class="box-title">{{ $movie->Title }}</div>
                <div class="box-tools">
                    <span class="label label-primary">{{ $movie->Rated }}</span>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <div style="float:left">
                    <img style="width: 200px; height: 300px; padding-right: 5px" src="{{ $movie->Poster }}">
                </div>

                <h4>Director: {{ $movie->Director }} <br>
                    Genre: {{ $movie->Genre }} <br>
                    Dauer: {{ $movie->Runtime }} <br>

                </h4>

                <p>{{ $movie->Plot }}</p>
            </div>


            <!-- /.box-body -->
            <!-- box-footer -->
            <div class="box-footer">


                Veröffentlicht im Jahre {{ $movie->Year  }}


                <form method="POST" action="/movie">
                    @csrf

                    <input type="hidden" value="{{ $movie->Title }}" name="Title">
                    <input type="hidden" value="{{ $movie->Rated }}" name="Rated">
                    <input type="hidden" value="{{ $movie->Poster }}" name="Poster">
                    <input type="hidden" value="{{ $movie->Director }}" name="Director">
                    <input type="hidden" value="{{$movie->Genre}}" name="Genre">
                    <input type="hidden" value="{{$movie->Runtime}}" name="Runtime">
                    <input type="hidden" value="{{$movie->Plot}}" name="Plot">
                    <input type="hidden" value="{{$movie->Year}}" name="Year">


                    <button type="submit" class="btn btn-success">In die Datenbank aufnehmen</button>
                </form>
            </div>
            <!-- /.box-footer -->
        </div>
    @endisset
@endsection
