@extends('layout')


@section('content')
    @foreach($movies as $movie)
        <div class="row col-12">
            <div class="box box-success">
                <div class="box-header ">
                    <div class="box-title"><h4><a href="/movie/{{ $movie->id }}"> {{ $movie->title }}</a></h4></div>
                    <div class="box-tools pull-right">

                        <span class="label label-primary">{{ $movie->rated }}</span>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3">
                            <img style="width: 100%" src="{{ $movie->poster }}">
                        </div>
                        <div class="col-md-9">
                            <h4>
                                Regisseur: {{ $movie->director }} <br>
                                Genre: {{ $movie->genre }} <br>
                                Dauer: {{ $movie->runtime }} <br>
                                Veröffentlichung: {{ $movie->year  }}
                            </h4>


                            <p>{{ $movie->plot }}</p>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                @if( Route::currentRouteName() != 'archiv' )
                    <div class="box-footer">
                        <div class="btn-group" role="group">

                            @if(auth()->user()->admin)
                                <form method="POST" action="/movie/{{ $movie->id }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success">Gesehen markieren</button>
                                </form>
                            @endif

                            <form method="POST" action="/movieInterest">
                                @csrf
                                <input type="hidden" value="{{ $movie->id }}" name="movie_id">
                                <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">

                                <button class="btn btn-success"
                                        type="submit">{{ $movie->peoples->contains(auth()->user()) ? 'Interesse zurückziehen' : 'Interesse zeigen!' }}</button>

                            </form>

                        </div>
                    </div>
                @endif

            </div>
        </div>
    @endforeach

    {{ $movies->links() }}

@endsection
