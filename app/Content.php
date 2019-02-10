<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Content extends Model
{
    protected $fillable = ["id", "title", "pageContent", "photo"];
    protected $primaryKey = "id";
    
    public static function mainPage() {
        return DB::table("contents")->select("title", "pageContent", "photo")->get();
    }
    
    public static function mainCount() {
        return DB::table("contents")->count();
    }
    
    public static function forEditConent() {
        return DB::table("contents")->select("id", "title", "pageContent", "photo")->get();
    }
}
