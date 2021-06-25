<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Services\FileService;

class Litter extends Model
{
    protected $fillable = ["litter","descrp","photo1","photo2","idDog1","idDog2"];
    protected $primaryKey = "id";
    
    public static function mainPage() {
        $temp = DB::table('litters')
                ->select('our_dogs.name AS name1', 'p.name AS name2', 'litters.*')
                ->join('our_dogs', 'our_dogs.id_dogs', 'litters.idDog1')
                ->join('our_dogs as p', 'p.id_dogs', 'litters.idDog2')
                ->paginate(4);;
        return $temp;        
    }
    
    public static function oneInput($id) {
        $temp = DB::table('litters')
                ->select('our_dogs.name AS name1', 'p.name AS name2', 'litters.*')
                ->where('litters.id', '=', $id)
                ->join('our_dogs', 'our_dogs.id_dogs', 'litters.idDog1')
                ->join('our_dogs as p', 'p.id_dogs', 'litters.idDog2')
                ->first();
        return $temp;
    }
        
    public static function delDiskPhoto($id) {
        return DB::table("photo_schens")->where("id", $id)->value("photo");
    }

    public static function createOrAddLitter($request)
    {
        if ($request->id) {
            if ($request->sw1 || $request->sw2) {
                if ($request->sw1 && $request->sw2) {
                    $path1 = FileService::newFileAdd($request->file('photo1'), 'img/litter');
                    $path2 = FileService::newFileAdd($request->file('photo2'), 'img/litter');
                
                    $arrUpdate = [
                        'litter' => $request->litter,
                        'descrp' => $request->descrp,
                        'photo1' => $path1,
                        'photo2' => $path2,
                        'idDog1' => $request->idDog1, 
                        'idDog2' => $request->idDog2,
                    ];
                } else if ($request->sw1) {
                    $path1 = FileService::newFileAdd($request->file('photo1'), 'img/litter');
                    
                    $arrUpdate = [
                        'litter' => $request->litter,
                        'descrp' => $request->descrp,
                        'photo1' => $path1,
                        'idDog1' => $request->idDog1, 
                        'idDog2' => $request->idDog2,
                    ];
                } else {
                    $path2 = FileService::newFileAdd($request->file('photo2'), 'img/litter');
                    
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
            DB::table('litters')->where('id', $request->id)->update($arrUpdate);
                $str = " изменена";        
        } else {
                    $path1 = FileService::newFileAdd($request->file('photo1'), 'img/litter');
                    $path2 = FileService::newFileAdd($request->file('photo2'), 'img/litter');
                
            DB::table('litters')->insert([
                    [
                        'litter' => $request->litter,
                        'descrp' => $request->descrp,
                        'photo1' => $path1,
                        'photo2' => $path2,
                        'idDog1' => $request->idDog1, 
                        'idDog2' => $request->idDog2,
                    ]
                ]);
                $str = " добавлена";
        }
        return $str;
    }
}
