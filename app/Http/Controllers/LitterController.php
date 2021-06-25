<?php
namespace App\Http\Controllers;

use App\Litter;
use App\Our_dog;
use App\Http\Requests\LitterRequest;
use App\PhotoSchen;
use App\Http\Requests\PhotoSchenRequest;
use Illuminate\Support\Facades\Storage;
use App\Services\FileService;

class LitterController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth")->only(["input", "photo", "delPhoto", 
            "savePhoto", "save", "destroy"]);
    }
    
    public function index() {        
        return view("litters", ["litt" => Litter::mainPage()]);
    }
    
    public function input(Litter $litter, $id = null) {
        if ($id) {
            return view ("litter.input", ["litt" => Litter::oneInput($id), "dog" => Our_dog::all()]);
        } else {
        return view ("litter.input", ["litt" => $litter, "dog" => Our_dog::all()]);
        }
    }
    
    public function vlitt($id) {
        return view ("litter.view", ["litter" => Litter::oneInput($id), "photo" => PhotoSchen::forView($id)]);
    }
    
    public function photo($id) {
        return view ("litter.photo", ["litter" => Litter::oneInput($id), "photos" => PhotoSchen::forView($id)]);
    }
    
    public function delphoto($idLitt, $photo) {
        PhotoSchen::destroy($photo);
        Storage::disk("my_files")->delete(Litter::delDiskPhoto($photo));
        return redirect()->action("LitterController@photo", ["id" => $idLitt]);
    }
        
    public function savePhoto(PhotoSchenRequest $request) {
        $paths = [];
        foreach($request->photo as $image) {
            $path1 = FileService::newFileAdd($image, 'img/litter');
            $paths[] = [
                'idLitt' => $request->id,
                'photo' => $path1,
                ];
        }
        Litter::insert($paths);
        return back()->with('status', 'Изображение было обновлено');
    }
    
    public function save(LitterRequest $request) {
        $str = Litter::createOrAddLitter($request);
    return redirect()->action("LitterController@index")->with("status", "Запись " . $request->litter . $str);
    }

    public function destroy(Litter $litt) {
        $name = $litt->litter;
        Litter::destroy($litt->id);
        return redirect()->action("LitterController@index")->with("status", "Запись " . $name . " удалена");
    }
}
