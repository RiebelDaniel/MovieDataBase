@extends('layout')


@section('content')
    <div class="box">
        <div class="box-header">
            Erstelle einen neuen User
        </div>

        <div class="box-body">
            <form method="POST" action="/user">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Username:</label>
                    <input class="form-control" name="username">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Passwort:</label>
                    <input class="form-control" name="password" type="password">
                </div>

                <button class="btn btn-success">Erstellen</button>

            </form>
        </div>


    </div>
@endsection
