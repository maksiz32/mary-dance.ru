<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App;
use App\Our_dog;
use App\Dogs_photo;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DogRequest;

class DogController extends Controller
{
    public function __construct() {
    //parent::__construct();
    //$this->middleware("can:manipulate,App\Dog")->except("view");
  }
    public function index() {
        $dogs = DB::table('our_dogs')->select('dogs_photos.photo', 'our_dogs.*')
                ->leftJoin('dogs_photos', 'dogs_photos.id_dogs', 'our_dogs.id_dogs')
                ->where('our_dogs.little', '=', '1')->orderBy('name')
                ->groupBy('name')->distinct('name')->get();
        
       return view("dogs1", ["dogs" => $dogs]);
        /*
        $dogs = Our_dog::select("dogs_photos.*", "our_dogs.*")
    ->join("dogs_photos", "dogs_photos.id_dogs", "our_dogs.id_dogs")
    ->orderBy("our_dogs.name")->get();
    return view("dogs1", ["dogs1" => $dogs]);
         * 
         */
        /*
        $dogs = DB::table("our_dogs")->where("little", "=", "1")->orderBy("date_age", "desc")->get();            
        $photos = DB::table("dogs_photos")->get();            
        return view("dogs1", ["dogs1" => $dogs, "photos" => $photos]);
         * 
         */
    }
    
    public function dogs() {
        $dogs = DB::table('our_dogs')->select('dogs_photos.photo', 'our_dogs.*')
                ->leftJoin('dogs_photos', 'dogs_photos.id_dogs', 'our_dogs.id_dogs')
                ->where('our_dogs.little', '=', '0')->orderBy('date_age', 'desc')
                ->groupBy('name')->distinct('name')->get();
        return view("dogs", ["dogs" => $dogs]);
        
        /*
        $dogs = DB::table("our_dogs")->where("little", "=", "0")->get();
        $photos = DB::table("dogs_photos")->get();
        return view("dogs", ["dogs" => $dogs, "photos" => $photos]);
         * 
         */
    }
    
    public function input(Our_dog $dogy, $page = null) {
        return view ("dog.input", ["dog" => $dogy, $page = $page]);
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
  
  public function view(Our_dog $id_dogs, $id=null) {
      if (isset($id)) {
          $photos = DB::table("dogs_photos")->where("id_dogs", "=", $id_dogs->id_dogs)->get();
            $mainPhoto = DB::table("dogs_photos")->where("id", "=", $id)->get();
            $photika = DB::table("dogs_photos")->select("photo")->where("id", "=", $id)->get();
            
            return view ("dog.view", ["dog" => $id_dogs, "photo" => $photos, "firstPhoto" => $photika]);
      } else {
          $photos = DB::table("dogs_photos")->where("id_dogs", "=", $id_dogs->id_dogs)->get();
          //dd($photos);
          $mainPhoto = null;
          $photika = null;
          if (isset($photos)) {
            return view ("dog.view", ["dog" => $id_dogs, "photo" => $photos, "firstPhoto" => null]);
          } else {
              return view ("dog.view", ["dog" => $id_dogs, "photo" => null, "firstPhoto" => null]);
          }
      }
    }
    
  public function destroy(App\Our_dog $category) {
    $name = $category->name;
    $category->delete();
    return redirect()->action("DogController@index")
    ->with("status", "Запись о собаке " . $name . " удалена");
  }
}
