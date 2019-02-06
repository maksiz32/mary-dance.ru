<?php
namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ContentRequest;

class MainController extends Controller
{
    public function index() {        
        return view("main", ["content" => Content::mainPage(), "count" => Content::mainCount()]);
    }
    
    public function all() {
        return view("contents.all", ["cont" => Content::forEditConent()]);
    }
    
    public function input(Content $content) {
        return view ("contents.input", ["content" => $content]);
    }
    
    public function save(ContentRequest $request) {
        if ($request->has("id")) {
            $cat = Content::findOrFail($request->id);
            $cat->fill($request->all())->save();
        } else {
            $cat = Content::create($request->all());
        }
    return redirect()->action("MainController@all");
    }
  /*
  public function destroy(Content $cont) {
    $delId = $cont->title;
    Content::destroy($cont->id);
    return redirect()->action("MainController@all")
    ->with("status", "Раздел " . $delId . " удалён");
  }
     * 
     */
}

