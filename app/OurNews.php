<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OurNews extends Model
{
    protected $fillable = ["title", "date", "photo", "text", "author"];
    protected $primaryKey = "id";
}
