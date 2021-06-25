<?php
namespace App\Http\Controllers;

use App\Our_dog;
use App\Dogs_photo;
use App\Http\Requests\DogRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\DogsPhotoRequest;
use App\Services\FileService;

class DogController extends Controller
{
    public function __construct() {
        $this->middleware("auth")->only(["input", "save", "destroy"]);
    }
    
    public function alldogs() {
        return view("dogs", ["dogs" => Our_dog::ourDogs()]);
    }
    
    public function delphoto($idDog, $photo) {
        Dogs_photo::destroy($photo);
        Storage::disk("my_files")->delete(Dogs_photo::delDiskPhoto($photo));
        return redirect()->action("DogController@input", ["dogy" => $idDog]);
    }
    
    public function savePhoto(DogsPhotoRequest $request) {
        $paths = [];
        foreach($request->photo as $image) {
            $path1 = FileService::newFileAdd($image, 'img/dogs');
            $paths[] = [
                'id_dogs' => $request->id,
                'photo' => $path1,
                ];
            sleep(1);
        }
        Dogs_Photo::insert($paths);
        return back()->with('status', 'Изображение добавлено');
    }
    
    public function view(Our_dog $id_dogs, $id=null) {
      $res = Our_dog::alDogsPrevue($id_dogs, $id);
      return view ("dog.view", $res);
    }
    
    public function input(Our_dog $dogy) {
      $photos = Dogs_photo::where("id_dogs", "=", $dogy->id_dogs)->get();
      return view ("dog.input", ["dog" => $dogy, "photo" => $photos]);
    }
    
    public function save(DogRequest $request) {
    if ($request->has("id_dogs")) {
      $dog = Our_dog::findOrFail($request->id_dogs);
      $dog->fill($request->all())->save();
      return redirect()->action("DogController@view", ['id_dogs' => $request->id_dogs])->with("status", "Запись о собаке " . $dog->name . " исправлена");
    } else {
      $dog = Our_dog::create($request->all());
    return redirect()->action("DogController@alldogs")->with("status", "Запись о собаке " . $dog->name . " создана");
    }
  }
    
  public function destroy(Our_dog $dogy) {
    $name = $dogy->name;
    $dogy->delete();
    return redirect()->action("DogController@alldogs")->with("status", "Запись о собаке " . $name . " удалена");
  }
}
