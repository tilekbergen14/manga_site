<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Manga;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $mangas = Manga::get();
        $chapters = Chapter::get();
        return view("welcome", ["mangas" => $mangas, "chapters" => $chapters]);
    }
}
