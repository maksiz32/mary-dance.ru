<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Services\FileService;

class Content extends Model
{
    protected $fillable = ["id", "title", "pageContent", "photo"];
    protected $primaryKey = "id";
    
    public static function mainPage() {
        return DB::table("contents")->select("id", "title", "pageContent", "photo")->get();
    }
    
    public static function mainCount() {
        return DB::table("contents")->count();
    }
    
    public static function delPhoto($id) {
        return Content::where("id", $id)->value("photo");
    }

    public static function contentUpdate($request, $path) {
        Content::where('id', $request['id'])->update([
            'title' => $request['title'], 
            'pageContent' => $request['pageContent'], 
            'photo' => $path
        ]);
    }
    
    public static function contentInsert($request, $path) {
        Content::insert([
            [
                'title' => $request['title'], 
                'pageContent' => $request['pageContent'], 
                'photo' => $path
            ]
        ]);
    }

    public static function contentCreateOrAdd($request, $file = null) {
        if ($file) {
            $file = FileService::newFileAdd($file, 'img/main');
            if (isset($request['id'])) {
                $delPhoto = Content::delPhoto($request['id']);
                Storage::disk('my_files')->delete($delPhoto);
            }
        } else {
            return ' при создании должен содержать изображение';
        }
        if (isset($request['id'])) {
            Content::contentUpdate($request, $file);
            $str = " изменен";
        } else {
            Content::contentInsert($request, $file);
            $str = " добавлен";
        }
        return $str;
    }
}
