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
        $this->middleware("auth")->only(["input", "save", "destroy"]);
    }
    
    public function index() {
        $news = DB::table("our_news")->orderBy("id", "desc")->paginate(4);
        return view("news", ["news1" => $news]);
    }
    
    public function input(OurNews $id) {
        return view ("news.input", ["nes" => $id]);
    }
    
    public function view(OurNews $id) {
        return view ("news.view", ["nes" => $id]);
    }
    
    public function save(NewsRequest $request) {
        //dd($request->photo);
    if ($request->has("id")) {
        if ($request->photo) {
            $image = $request->photo;
            $imageName = time() . '_marydance' . '.' . $image->getClientOriginalExtension();
            $path1 = $image->storeAs('img/news', $imageName, 'my_files');
            $arrUpdate = [
                'title' => $request->title,
                'date' => $request->date,
                'photo' => $path1,
                'text' => $request->text,
                'author' => $request->author,
            ];
        } else {
        /*
        $news = OurNews::findOrFail($request->id);
        $news->fill($request->all())->save();
         * 
         */
            $arrUpdate = [
                'title' => $request->title,
                'date' => $request->date,
                'text' => $request->text,
                'author' => $request->author,
            ];
        }
        DB::table('our_news')->where('id', $request->id)->update($arrUpdate);
      $s = " исправлена";
    } else {
        if ($request->photo) {
        //ПЕРЕНЕСТИ ЛОГИКУ В МОДЕЛЬ
        $image = $request->photo;
            $imageName = time() . '_marydance' . '.' . $image->getClientOriginalExtension();
            $path1 = $image->storeAs('img/news', $imageName, 'my_files');
            $arrInsert = [
                'title' => $request->title,
                'date' => $request->date,
                'photo' => $path1,
                'text' => $request->text,
                'author' => $request->author,
                ];
    } else {
        $arrInsert = [
                'title' => $request->title,
                'date' => $request->date,
                'text' => $request->text,
                'author' => $request->author,
                ];
    }
        DB::table('our_news')->insert($arrInsert);
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
