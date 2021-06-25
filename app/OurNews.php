<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Services\FileService;

class OurNews extends Model
{
    protected $fillable = ["title", "date", "photo", "text", "author"];
    protected $primaryKey = "id";

    public static function createOrAddNews($request)
    {
        $str = '';
        $arrChange = [
            'title' => $request->title,
            'date' => $request->date,
            'text' => $request->text,
            'author' => $request->author,
        ];
        if ($request->has("id")) {
            if ($request->photo) {
                $path1 = FileService::newFileAdd($request->photo, 'img/news');
                $arrChange['photo'] = $path1;
            }
            OurNews::where('id', $request->id)->update($arrChange);
            $str = " исправлена";
        } else {
            if ($request->photo) {
                $path1 = FileService::newFileAdd($request->photo, 'img/news');
                $arrChange['photo'] = $path1;
            }
            OurNews::insert($arrChange);
            $str = " создана";
        }
        return $str;
    }
}
