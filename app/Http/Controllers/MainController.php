<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        return view("main");
    }
    
    public function news() {
        return view("news");        
    }
    
    public function care() {
        return view("care");
    }
    
    public function dogs() {
        return view("dogs");
    }
}
