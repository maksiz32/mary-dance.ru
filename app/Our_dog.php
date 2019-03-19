<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
}
