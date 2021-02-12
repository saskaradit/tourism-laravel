<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        $articles = Article::orderBy('created_at','desc')->paginate(5);
        return view('pages.index')->with('articles',$articles);
    }
}
