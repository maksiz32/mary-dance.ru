<?php
namespace App\Http\Controllers;

use App\Content;
use App\Http\Requests\ContentRequest;
use Illuminate\Support\Facades\Storage;


class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth")->only(["all", "main", "input", "save", "destroy"]);
    }
    
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
        $str = Content::contentCreateOrAdd($request->all(), $request->photo);
        return redirect()->action("MainController@all")->with("status", "Раздел " . $request->title . $str);
    }
    
    public function destroy(Content $content) {
        if (isset($content->photo)) {
            $delPhoto = Content::delPhoto($content->id);
            Storage::disk("my_files")->delete($delPhoto);
        }
        Content::destroy($content->id);
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

