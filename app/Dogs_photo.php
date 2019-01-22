<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dogs_photo extends Model
{
    public function our_dogs() {
        return $this->belongsTo("App\Our_dog", "id_dogs", "id_dogs");
    }
    
    protected $primaryKey = 'id_dogs';
}
