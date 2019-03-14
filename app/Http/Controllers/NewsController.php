<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\OurNews;
use App\Http\Requests\NewsRequest;

class NewsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth')->except(["news", "view"]);
    }
    
    public function index() {
        $news = DB::table("our_news")->orderBy("id", "desc")->paginate(6);
        return view("news", ["news1" => $news]);
    }
    
    public function input(OurNews $id) {
        return view ("news.input", ["nes" => $id]);
    }
    
    public function view(OurNews $id) {
        return view ("news.view", ["nes" => $id]);
    }
    
    public function save(NewsRequest $request) {
    if ($request->has("id")) {
      $news = OurNews::findOrFail($request->id);
      $news->fill($request->all())->save();
      $s = " исправлена";
    } elseif ($request->file("photo")) {
        //ПЕРЕНЕСТИ ЛОГИКУ В МОДЕЛЬ
        
        ##############################################
        ##                                          ##
        ##  ВМЕСТО СЫРОГО SQL-ЗАПРОСА ИСПОЛЬЗОВАТЬ  ##
        ##  МОДЕЛЬ OurNews                          ##
        ##                                          ##
        ##############################################
        
        $time_rep = time();        
        $exch = $request->file('photo')->getClientOriginalExtension();
        $name = $time_rep . '_mary-dance_ru' . '.' . $exch;
        $path = $request->file('photo')->storeAs('img', $name, 'my_files');
        $news = DB::insert('insert into our_news (title, date, photo, text, author) values (?, ?, ?, ?, ?)', 
                [$request->title, $request->date, $path, $request->text, $request->author]);
        $s = " создана";    
    } else {
        $news = DB::insert('insert into our_news (title, date, text, author) values (?, ?, ?, ?)', 
                [$request->title, $request->date, $request->text, $request->author]);
        $s = " создана";
    }
        $news = $request->title;
    return redirect()->action("NewsController@index")
    ->with("status", "Новость " . $news . $s);
  }
  
  public function destroy(OurNews $nes) {
    $name = $nes->title;
    OurNews::destroy($nes->id);
    return redirect()->action("NewsController@index")
    ->with("status", "Запись " . $name . " удалена");
}
  
}
