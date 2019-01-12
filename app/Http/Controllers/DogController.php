<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App;
use Illuminate\Support\Facades\DB;

class DogController extends Controller
{
    public function index() {
        $dogs = DB::table("our_dogs")->where("little", "=", "1")->orderBy("date_age", "desc")->get();            
        $photos = DB::table("dogs_photos")->get();            
        return view("dogs1", ["dogs1" => $dogs, "photos" => $photos]);
    }
    
    public function dogs() {
        $dogs = DB::table("our_dogs")->where("little", "=", "0")->get();            
        $photos = DB::table("dogs_photos")->get();            
        return view("dogs", ["dogs" => $dogs, "photos" => $photos]);
    }
    
    public function news() {
        $news = DB::table("news")->orderBy("id_news", "desc")->get();
        return view("news", ["news1" => $news]);
    }
}
