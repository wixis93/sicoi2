<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
class loginC extends Controller
{

    
    public function index()
    {
       
    }

    public function logeo(Request $request){

       if(Auth::check()){
         dd("entra");
            if(Auth::user()->idprivilegio == 1){
                    return redirect('/admin');
                }
            } 
            //dd("valgo verga");
        return view('/');

        

     }
    
}
