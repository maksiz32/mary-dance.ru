<?php
namespace App\Http\Controllers;

use App\Content;
use App\Http\Requests\ContentRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class MainController extends Controller
{
    public function index() {        
        return view("main", ["content" => Content::mainPage(), "count" => Content::mainCount()]);
    }
    
    public function all() {
        return view("contents.all", ["cont" => Content::mainPage()]);
    }
    
    public function input(Content $content) {
        return view ("contents.input", ["content" => $content]);
    }
    
    public function save(ContentRequest $request) {
        if ($request->file("photo")) {
            $delPhoto = Content::delPhoto($request->id);
            $time_rep = time();        
            $exch = $request->file('photo')->getClientOriginalExtension();
            $name = $time_rep . '_mary-dance_ru' . '.' . $exch;
            $path = $request->file('photo')->storeAs('img/main', $name, 'my_files');
            if ($request->has("id")) {
                $cat = DB::table('contents')->where('id', $request->id)->update([
                        'title' => $request->title, 
                        'pageContent' => $request->pageContent, 
                        'photo' => $path
                ]);
                Storage::disk('my_files')->delete($delPhoto);
                $s = " изменен";
            } else {
                $cat = DB::table('contents')->insert([
                    [
                        'title' => $request->title, 
                        'pageContent' => $request->pageContent, 
                        'photo' => $path
                    ]
                ]);
                $s = " добавлен";
            }
        } elseif ($request->has("id")) {
            $cat = Content::findOrFail($request->id);
            $cat->fill($request->all())->save();
            $s = " изменен";
        } else {
            $cat = Content::create($request->all());
            $s = " добавлен";
        }
    return redirect()->action("MainController@all")->with("status", "Раздел " . $request->title . $s);
    }
    
    public function destroy(Content $content) {
        if (isset($content->photo)) {
            $delPhoto = Content::delPhoto($content->id);
        }
        Content::destroy($content->id);
        Storage::disk("my_files")->delete($delPhoto);
        return redirect()->action("MainController@all")
                ->with("status", "Раздел " . $content->title . " удалён");
        }
        
    public function onepart(Content $content) {
        return view("contents.part", ["content" => $content]);
    }
    
    public function main() {        
        return view("adm.main");
    }
}

