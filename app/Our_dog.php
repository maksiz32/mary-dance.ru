<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Our_dog extends Model
{
    protected $fillable = ["name", "sex", "date_age", "family", "dbres"];
    
    public function dogs_photos() {
        return $this->hasMany("App\Dogs_photo", "id_dogs", "id_dogs");
    }
    
    protected $primaryKey = 'id_dogs';
}
