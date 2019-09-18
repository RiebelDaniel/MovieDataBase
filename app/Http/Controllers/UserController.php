<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        if( auth()->user()->admin == '0'){
            return back();
        }
        $users = User::paginate(15);
        return view('userSystem.list',[
            'users' => $users
        ]);
    }


    public function create()
    {
        if( auth()->user()->admin == '0'){
            return back();
        }

        return view('userSystem.create');
    }


    public function store()
    {
        if( auth()->user()->admin == '0'){
            return back();
        }

        $data = request()->validate([
            'username' => ['required','unique:users'],
            'password' => 'required'
        ]);

        $newUser = new User();
        $newUser->username = $data['username'];
        $newUser->password = Hash::make($data['password']);
        $newUser->admin = '0';


        $newUser->save();



        return redirect('/');

    }


    public function show(User $user)
    {
        return view('userSystem.show',[
            'user' => $user
        ]);
    }

public function update(User $user)
    {
        if( auth()->user()->admin == '0'){
            return back();
        }

        if(auth()->user()->id == $user->id){
            session()->flash('message','Lass das!');
            return back();
        }

        if($user->admin == '0'){
            $user->admin = '1';
        } else{
            $user->admin = '0';
        }
        $user->save();
        return back();
    }






    public function login()
    {
        return view('userSystem.login');
    }
    public function loginCheck()
    {
        $possibleUser = User::where('username',request('username'))->get()->first();


        if($possibleUser == null){
            session()->flash('message','Der User existiert nicht!');
            return redirect('/login');
        }

        if (Hash::check(request('password'), $possibleUser->password)) {

            Auth::login($possibleUser);
            return redirect('/');

        }

        session()->flash('message','Das Passwort war falsch!');
        return redirect('/login');
    }

    public function logout(){
        Auth::logout();
        return redirect( '/');
    }

    public function passwordChange(){

        $user = User::find(request('user_id'));
        $user->password = Hash::make(request('password'));

        $user->save();

        return back();


    }
}
