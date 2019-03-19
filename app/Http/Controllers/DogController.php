<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Our_dog;
use App\Dogs_photo;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DogRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\DogsPhotoRequest;

class DogController extends Controller
{
    public function __construct() {
        $this->middleware("auth")->only(["input", "save", "destroy"]);
    }
    
    public function alldogs() {
        return view("dogs", ["dogs" => Our_dog::ourDogs()]);
    }
    
    public function delphoto($idDog, $photo) {
        dd($photo);
        Dogs_photo::destroy($photo);
        Storage::disk("my_files")->delete(Dogs_photo::delDiskPhoto($photo));
        return redirect()->action("DogController@input", ["dogy" => $idDog]);
    }
    
    public function savePhoto(DogsPhotoRequest $request) {
        //dd($request);
        $paths = [];
        $i = 0;
        foreach($request->photo as $image) {
            $imageName = time() . $i . '_marydance' . '.' . $image->getClientOriginalExtension();
            $path1 = $image->storeAs('img/dogs', $imageName, 'my_files');
            $paths[] = [
                'id_dogs' => $request->id,
                'photo' => $path1,
                ];
            $i++;
        }
        DB::table('dogs_photos')->insert($paths);
        return back()->with('status', 'Image Uploaded successfully.');
    }
    
    public function view(Our_dog $id_dogs, $id=null) {
      if (isset($id)) {
          $photos = DB::table("dogs_photos")->where("id_dogs", "=", $id_dogs->id_dogs)->get();
            $mainPhoto = DB::table("dogs_photos")->where("id", "=", $id)->get();
            $photika = DB::table("dogs_photos")->select("photo")->where("id", "=", $id)->get();            
            return view ("dog.view", ["dog" => $id_dogs, "photo" => $photos, "firstPhoto" => $photika]);
      } else {
          $photos = DB::table("dogs_photos")->where("id_dogs", "=", $id_dogs->id_dogs)->get();
          $mainPhoto = null;
          $photika = null;
          if (isset($photos)) {
            return view ("dog.view", ["dog" => $id_dogs, "photo" => $photos, "firstPhoto" => null]);
          } else {
              return view ("dog.view", ["dog" => $id_dogs, "photo" => null, "firstPhoto" => null]);
          }
      }
    }
    
    public function input(Our_dog $dogy) {
        $photos = DB::table("dogs_photos")->where("id_dogs", "=", $dogy->id_dogs)->get();
        return view ("dog.input", ["dog" => $dogy, "photo" => $photos]);
    }
    
    public function save(DogRequest $request) {
    if ($request->has("id_dogs")) {
      $dog = Our_dog::findOrFail($request->id_dogs);
      $dog->fill($request->all())->save();
      $s = " исправлена";
      return redirect()->action("DogController@view", ['id_dogs' => $request->id_dogs])
              ->with("status", "Запись о собаке " . $dog->name . $s);
    } else {
      $dog = Our_dog::create($request->all());
      $s = " создана";
    return redirect()->action("DogController@alldogs")
            ->with("status", "Запись о собаке " . $dog->name . $s);
    }
  }
    
  public function destroy(Our_dog $dogy) {
    $name = $dogy->name;
    $dogy->delete();
    return redirect()->action("DogController@alldogs")
    ->with("status", "Запись о собаке " . $name . " удалена");
  }
}
