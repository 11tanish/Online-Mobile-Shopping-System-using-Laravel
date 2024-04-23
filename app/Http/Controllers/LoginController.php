<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Userm;

class LoginController extends Controller
{
    public function index()
    {
       // if($request->email=="admin@admin.com" && $request->password=="admin@123")
         //   return redirect("/dashboard");
        //else
          //  return redirect("/home");
          return view('login');
    }

    public function auth(Request $request)
    {
            $user = Userm::where([
                "email" => $request->email,
                "password" => $request->password
            ])->first();

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) 
                $user = Auth::user();
        
            {
                if($user->usertype === "Admin"){
                    $request->session()->put('userid',$user->userid);
                    $request->session()->put('fullname',$user->fullname);
                    $request->session()->put('usertype',$user->usertype);
                    $request->session()->put('profilephoto', $user->profilephoto);
                    return redirect('/dashboard');
                }
                    
                else if($user->usertype === "customer"){
                    $request->session()->put('userid',$user->userid);
                    $request->session()->put('fullname',$user->fullname);
                    $request->session()->put('usertype',$user->usertype);
                    $request->session()->put('profilephoto', $user->profilephoto);
                    return redirect('/');
                }
                   // echo "You are not admin";
                else{
                      return view('user-layout.content', ['user' => $user]);
                }
            }            
            return back()->withErrors("Invalid Username or Password");                 
    }
}
