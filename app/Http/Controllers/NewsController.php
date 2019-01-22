<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\OurNews;

class NewsController extends Controller
{
    public function index() {
        $news = DB::table("news")->orderBy("id", "desc")->get();
        return view("news", ["news1" => $news]);
    }
    
    public function input(OurNews $dogy) {
        return view ("news.input", ["nes" => $dogy]);
    }
    
    public function save(DogRequest $request) {
    if ($request->has("id_dogs")) {
      $dog = Our_dog::findOrFail($request->id_dogs);
      $dog->fill($request->all())->save();
      $s = " исправлена";
    } else {
      $dog = Our_dog::create($request->all());
      $s = " создана";
    }
    if ($request->page === '1') {
        $page = 'dogs';
    } else {
        $page = 'index';
    }
    return redirect()->action("DogController@$page")
    ->with("status", "Запись о собаке " . $dog->name . $s);
  }
  
}
