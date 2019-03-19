<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dogs_photo extends Model
{
    public function our_dogs() {
        return $this->belongsTo("App\Our_dog", "id_dogs", "id_dogs");
    }
    
    public static function delDiskPhoto($id) {
        return DB::table("dogs_photos")->where("id", $id)->value("photo");
    }
    
    protected $primaryKey = 'id_dogs';
}
