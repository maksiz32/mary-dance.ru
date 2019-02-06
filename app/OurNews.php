<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OurNews extends Model
{
    protected $fillable = ["id", "date", "title", "text", "author"];
    protected $primaryKey = 'id';
}
