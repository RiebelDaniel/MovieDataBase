@extends('layout')


@section('content')

    <?php
    function endsWith($haystack, $needle)
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }

        return (substr($haystack, -$length) === $needle);
    }
    ?>



    @foreach($movies as $movie)
        <div class="box box-success">
            <div class="box-header ">
                <div class="box-title"><h4><a href="/movie/{{ $movie->id }}"> {{ $movie->titel }}</a></h4></div>
                <div class="box-tools pull-right">

                    <span class="label label-primary">{{ $movie->rated }}</span>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                    <div style="float:left">
                        <img style="width: 200px; height: 300px; padding-right: 5px" src="{{ $movie->poster }}">
                    </div>

                    <h4>Director: {{ $movie->director }} <br>
                    Genre: {{ $movie->genre }} <br>
                    Dauer: {{ $movie->runtime }} <br>

                    </h4>


                    {{ $movie->plot }}



            <!-- /.box-body -->
            <div class="box-footer">




                Veröffentlich im Jahre {{ $movie->year  }}
                @if( endsWith (url()->current(),'movie') )
                @if(auth()->user()->admin == '1')


                <div style="padding-bottom: 5px">

                            <form method="POST" action="/movie/{{ $movie->id }}">
                                @csrf
                                @method('PATCH')
                                    <button type="submit" class="btn btn-success" > Gesehen markieren </button>
                            </form>


                </div>
                @endif

                    <form method="POST" action="/movieInterest">
                        @csrf
                        <input type="hidden" value="{{ $movie->id }}" name="movie_id">
                        <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">

                        <button class="btn btn-success" type="submit"><?= ($movie->peoples->contains(auth()->user()) ?   'Interesse zurückziehen':'Interesse zeigen!') ?></button>


                    </form>
                    @endif
            </div>

            <!-- box-footer -->
        </div>
            <br>
            @endforeach
        <!-- /.box -->






    {{ $movies->links() }}


@endsection
