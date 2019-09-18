<?php

namespace App\Http\Controllers;

use App\Movie;
use App\User;


class MovieController extends Controller
{

    public function index()
    {

        $movies = Movie::where('watched','0')->orderBy('id','desc')->paginate(8);

        return view('movieSystem.list',[
            'movies' => $movies
        ]);

    }

    public function indexArchiv()
    {

        $movies = Movie::where('watched','1')->orderBy('id','desc')->paginate(8);

        return view('movieSystem.list',[
            'movies' => $movies
        ]);

    }

    public function create()
    {
        return view('movieSystem.create');
    }


    public function search(){

        $movieName = request('movieTitle');
        $movieName = str_replace(' ', '+', $movieName);

        $data = file_get_contents('http://www.omdbapi.com/?apikey=1911296f&t='.$movieName.'&type=movie');


        $movie = json_decode($data);

        if(isset($movie->Error)){
            session()->flash('message','Kein Film gefunden!');
            return back();
        }

        return view('movieSystem.create',[
            'movie' => $movie
        ]);


    }


    public function store()
    {

        $maybe = Movie::where('titel',request('Title'))->get()->first();

        if($maybe != null){
            return redirect('/movie/create')->withErrors([ 'Der Film ist bereits in der Datenbank']);
           // return Redirect::back()->withErrors(['msg', 'Der Film ist bereits in der Datenbank']);;

        } else {
            $movie = new Movie();

            $movie->titel = request('Title');
            $movie->rated = request('Rated');
            $movie->poster = request('Poster');
            $movie->director = request('Director');
            $movie->genre = request('Genre');
            $movie->runtime = request('Runtime');
            $movie->plot =request('Plot');
            $movie->year =request('Year');
            $movie->watched ='0';


            $movie->save();
            return redirect('/');
        }




    }

    public function show (Movie $movie)
    {
        return view('movieSystem.show',[
            'movie' => $movie
        ]);
    }


    public function update( Movie $movie)
    {
        if( auth()->user()->admin == '0'){
            return back();
        }



        $movie->watched = "1";

        $movie->save();

        return back();

    }

    public function showInterest(){

        $movie = Movie::find(request('movie_id'));
        $user = User::find(request('user_id'));

        if($movie->peoples->contains($user)){
            $movie->peoples()->detach(request('user_id'));
        }else{
            $movie->peoples()->attach(request('user_id'));
        }



        return back();
    }


}
