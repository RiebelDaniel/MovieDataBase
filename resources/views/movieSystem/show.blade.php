@extends('layout')


@section('content')



        <div class="box box-success">
            <div class="box-header ">
                <div class="box-title"><h4>{{ $movie->titel }}</h4></div>
                <div class="box-tools pull-right">

                    <span class="label label-primary">{{ $movie->rated }}</span>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                    <div style="float:left">
                        <img style="width: 200px; height: 300px;" src="{{ $movie->poster }}">
                    </div>

                    <h4>Director: {{ $movie->director }} <br>
                        Genre: {{ $movie->genre }} <br>
                        Dauer: {{ $movie->runtime }} <br>

                    </h4>


                    {{ $movie->plot }}
                    <br>

                    Interessierte Personen:
                    @foreach($movie->peoples as $user)
                    <br>

                    - <a href="/user/{{$user->id}}">{{ $user->username }} </a>




                    @endforeach

            </div>

            <!-- /.box-body -->
            <div class="box-footer">




                    Veröffentlich im Jahre {{ $movie->year  }}

                <div style="padding-bottom: 5px">


                    <form method="POST" action="/movieInterest">
                        @csrf
                        <input type="hidden" value="{{ $movie->id }}" name="movie_id">
                        <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">

                        <button class="btn btn-success" type="submit"><?= ($movie->peoples->contains(auth()->user()) ?   'Interesse zurückziehen':'Interesse zeigen!') ?></button>


                    </form>
                </div>
            </div>
            <!-- box-footer -->
        </div>



    @endsection
