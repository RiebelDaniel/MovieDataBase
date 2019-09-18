<?php

namespace App\Http\Controllers;

use App\Movie;
use App\User;


class MovieController extends Controller
{

    public function index()
    {

        $movies = Movie::where('watched', '0')->orderBy('id', 'desc')->paginate(8);

        return view('movieSystem.list', compact('movies'));

    }

    public function indexArchiv()
    {

        $movies = Movie::where('watched', '1')->orderBy('id', 'desc')->paginate(8);

        $data = ['bla'];

        return view('movieSystem.list', compact('movies', 'data'));

    }

    public function create()
    {
        return view('movieSystem.create');
    }


    public function search()
    {

        $movieName = request('movieTitle');
        $movieName = str_replace(' ', '+', $movieName);

        $data = file_get_contents('http://www.omdbapi.com/?apikey=1911296f&t=' . $movieName . '&type=movie');


        $movie = json_decode($data);

        if (isset($movie->Error)) {
            session()->flash('message', 'Kein Film gefunden!');
            return back();
        }

        return view('movieSystem.create', compact('movie'));


    }


    public function store()
    {

        $maybe = Movie::where('title', request('Title'))->get()->first();

        if ($maybe !== null) {
            return redirect('/movie/create')->withErrors(['Der Film ist bereits in der Datenbank']);
            // return Redirect::back()->withErrors(['msg', 'Der Film ist bereits in der Datenbank']);;

        } else {
            $movie = new Movie();

            foreach (request()->except('_token') as $field => $value) {
                $field = strtolower($field);
                $movie->$field = $value;
            }

            $movie->watched = '0';

            $movie->save();
            return redirect('/');
        }

    }

    public function show(Movie $movie)
    {
        return view('movieSystem.show', compact('movie'));
    }


    public function update(Movie $movie)
    {
        if (!auth()->user()->admin) {
            return back();
        }

        $movie->setWatched()->save();

        return back();

    }

    public function showInterest()
    {

        $movie = Movie::find(request('movie_id'));
        $user = User::find(request('user_id'));

        $movie->peoples()->toggle(request('user_id'));

        return back();
    }


}
