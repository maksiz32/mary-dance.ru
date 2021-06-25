<?php

namespace App\Http\Controllers;

use App\OurNews;
use App\Http\Requests\NewsRequest;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth")->only(["input", "save", "destroy"]);
    }
    
    public function index() {
        $news = OurNews::orderBy("id", "desc")->paginate(4);
        return view("news", ["news1" => $news]);
    }
    
    public function input(OurNews $id) {
        return view ("news.input", ["nes" => $id]);
    }
    
    public function view(OurNews $id) {
        return view ("news.view", ["nes" => $id]);
    }
    
    public function save(NewsRequest $request) {
        $str = OurNews::createOrAddNews($request);
        $news = $request->title;
        return redirect()->action("NewsController@index")->with("status", "Новость " . $news . $str);
  }
  
    public function destroy(OurNews $nes) {
        $name = $nes->title;
        OurNews::destroy($nes->id);
        return redirect()->action("NewsController@index")->with("status", "Запись " . $name . " удалена");
    }
  
}
