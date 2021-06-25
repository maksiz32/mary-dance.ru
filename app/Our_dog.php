<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Dogs_photo;

class Our_dog extends Model
{
    protected $fillable = ["name", "sex", "date_age", "dbres", "sale"];    
    protected $primaryKey = 'id_dogs';
    
    public function dogs_photos() {
        return $this->hasMany("App\Dogs_photo", "id_dogs", "id_dogs");
    }
    
    public static function ourDogs() {
        return DB::table('our_dogs')->select('dogs_photos.photo', 'our_dogs.*')
                ->leftJoin('dogs_photos', 'dogs_photos.id_dogs', 'our_dogs.id_dogs')
                ->orderBy('date_age', 'desc')->groupBy('name')->distinct('name')
                ->paginate(8);
    }

    public static function alDogsPrevue($id_dogs, $id)
    {
        $photos = Dogs_photo::where("id_dogs", "=", $id_dogs->id_dogs)->get();
        if (isset($id)) {
            $photika = Dogs_photo::select("photo")->where("id", "=", $id)->get();
        } else {
            $photika = null;
        }
        $arr = ["dog" => $id_dogs, "photo" => $photos, "firstPhoto" => $photika];
        return $arr;
    }
}
