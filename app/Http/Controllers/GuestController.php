<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(){
        $data['title'] = "iSchool";
        $data['menu'] = "Dashboard";
        $data['submenu'] = "Main Menu";
        
        return view('front.front-index', $data);
    }
}
