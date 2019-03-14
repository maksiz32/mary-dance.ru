<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PhotoSchen extends Model
{
    protected $fillable = ["idLitt", "photo"];
    protected $primaryKey = "id";
    
    public static function forView($id) {
        return DB::table('photo_schens')->where('idLitt', '=', $id)->paginate(14);
    }
}
