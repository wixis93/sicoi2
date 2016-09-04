<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){
        //dd("admincon");
        //return view('website.index');
        return "eres admin ganador!!";
    }

    public function logout(){
        session()->forget('Admin');
        return redirect('/');
         
    }

}
