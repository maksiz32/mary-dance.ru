<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
}
