<?php
namespace App\Http\Controllers;

use App\Litter;
use App\Our_dog;
use App\Http\Requests\LitterRequest;
use Illuminate\Support\Facades\DB;
use App\PhotoSchen;
use App\Http\Requests\PhotoSchenRequest;
use Illuminate\Support\Facades\Storage;

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
        //dd($request->photo);
        $paths = [];
        $i = 0;
        foreach($request->photo as $image) {
            $imageName = time() . $i . '_marydance' . '.' . $image->getClientOriginalExtension();
            $path1 = $image->storeAs('img/litter', $imageName, 'my_files');
            $paths[] = [
                'idLitt' => $request->id,
                'photo' => $path1,
                ];
            $i++;
        }
        DB::table('photo_schens')->insert($paths);
        return back()->with('status', 'Image Uploaded successfully.');
    }
    
    public function save(LitterRequest $request) {
        if ($request->id) {
            if ($request->sw1 || $request->sw2) {
                if ($request->sw1 && $request->sw2) {
                    $time_r = time();
                    $exch1 = $request->file('photo1')->getClientOriginalExtension();
                    $name1 = $time_r . '_mary-dance_ru' . '.' . $exch1;
                    $path1 = $request->file('photo1')->storeAs('img/litter', $name1, 'my_files');
                    $time_r2 = time() + 1;
                    $exch2 = $request->file('photo2')->getClientOriginalExtension();
                    $name2 = $time_r2 . '_mary-dance_ru' . '.' . $exch2;
                    $path2 = $request->file('photo2')->storeAs('img/litter', $name2, 'my_files');
                
                    $arrUpdate = [
                        'litter' => $request->litter,
                        'descrp' => $request->descrp,
                        'photo1' => $path1,
                        'photo2' => $path2,
                        'idDog1' => $request->idDog1, 
                        'idDog2' => $request->idDog2,
                    ];
                } else if ($request->sw1) {
                    $time_r = time();
                    $exch1 = $request->file('photo1')->getClientOriginalExtension();
                    $name1 = $time_r . '_mary-dance_ru' . '.' . $exch1;
                    $path1 = $request->file('photo1')->storeAs('img/litter', $name1, 'my_files');
                    
                    $arrUpdate = [
                        'litter' => $request->litter,
                        'descrp' => $request->descrp,
                        'photo1' => $path1,
                        'idDog1' => $request->idDog1, 
                        'idDog2' => $request->idDog2,
                    ];
                } else {
                    $time_r2 = time() + 1;
                    $exch2 = $request->file('photo2')->getClientOriginalExtension();
                    $name2 = $time_r2 . '_mary-dance_ru' . '.' . $exch2;
                    $path2 = $request->file('photo2')->storeAs('img/litter', $name2, 'my_files');
                    
                    $arrUpdate = [
                        'litter' => $request->litter,
                        'descrp' => $request->descrp,
                        'photo2' => $path2,
                        'idDog1' => $request->idDog1, 
                        'idDog2' => $request->idDog2,
                    ];
                }
            } else {
                $arrUpdate = [
                    'litter' => $request->litter,
                    'descrp' => $request->descrp,
                    'idDog1' => $request->idDog1, 
                    'idDog2' => $request->idDog2,
                ];
            }            
            $lit = DB::table('litters')->where('id', $request->id)->update($arrUpdate);
                $s = " изменена";        
        } else {
                    $time_r = time();
                    $exch1 = $request->file('photo1')->getClientOriginalExtension();
                    $name1 = $time_r . '_mary-dance_ru' . '.' . $exch1;
                    $path1 = $request->file('photo1')->storeAs('img/litter', $name1, 'my_files');
                    $time_r2 = time() + 1;
                    $exch2 = $request->file('photo2')->getClientOriginalExtension();
                    $name2 = $time_r2 . '_mary-dance_ru' . '.' . $exch2;
                    $path2 = $request->file('photo2')->storeAs('img/litter', $name2, 'my_files');
                
            $lit = DB::table('litters')->insert([
                    [
                        'litter' => $request->litter,
                        'descrp' => $request->descrp,
                        'photo1' => $path1,
                        'photo2' => $path2,
                        'idDog1' => $request->idDog1, 
                        'idDog2' => $request->idDog2,
                    ]
                ]);
                $s = " добавлена";
    }
    return redirect()->action("LitterController@index")
    ->with("status", "Запись " . $request->litter . $s);
}

public function destroy(Litter $litt) {
    $name = $litt->litter;
    Litter::destroy($litt->id);
    return redirect()->action("LitterController@index")
    ->with("status", "Запись " . $name . " удалена");
}
}
