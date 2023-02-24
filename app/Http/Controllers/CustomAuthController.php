<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Genre;
use Hash;
use Session;

class CustomAuthController extends Controller
{
    public function login() {
        return view("auth.login");
    }

    public function registration() {
        return view("auth.registration");
    }

    //Hier wordt een nieuwe user aangemaakt
    public function registerUser(Request $request) {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if($res) {
            return back()->with('success', 'You have registered succesfuly');
        } else {
             return back()->with('fail', 'Something wrong');
        }
    }

    //Deze functie wordt gebruikt om ingevoerde wachtwoord te vergelijken en daarna inloggen
    public function loginUser(Request $request) {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
            } else {
                return back()->with('fail', 'Password not matches.');
            }
        } else{
            return back()->with('fail', 'This email is not registered.');
        }
    }

    // in deze functie wordt id van gebruiker opgehaald en data van genres en in compact ingezet
    public function dashboard() {
        $data = array();
        if(Session::has('loginId')){
            $getID = new SessionController();
            $userID = $getID->getID();
            $data = User::where('id', '=', $userID)->first();
            $genres = Genre::get();
        }
        return view('dashboard', compact('data'), ['genres' => $genres]);
    }

    // Hier als een gebruiker gaat uitloggen worden functies van Session Controller opgeroepen
    public function logout() {
        if(Session::has('loginId')){
            
            $deleteSession= new SessionController();
            $deleteSession->deleteUserID();
            $deleteSession->deleteAllSongsTemp();

                     
            return redirect('login');
        }
    }
    
}
