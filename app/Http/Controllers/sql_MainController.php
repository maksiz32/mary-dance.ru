<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index() {
        $cont = DB::table('contents')->select('title', 'pageContent')->get();
        return view("main", ["content" => $cont]);
    }
}

