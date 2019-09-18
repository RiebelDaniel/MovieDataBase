@extends('layout')

@section('content')
    @if($errors->any())
        <h4>{{$errors->first()}}</h4>
    @endif
    <div class="box">

        <div class="box-body">
            <table class="table">

                <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Username</th>
                    <th scope="col">Admin</th>

                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td> <a href="/user/{{$user->id}}">{{ $user->username }} </a></td>
                        <td><?= ($user->admin == '1') ? 'Ja' : 'Nein';  ?></td>
                    </tr>
               @endforeach
                </tbody>
            </table>
        </div>
            {{ $users->links() }}
    </div>
@endsection
