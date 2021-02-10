<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at','desc')->paginate(5);
        return view('articles.index')->with('articles',$articles);
    }


    public function create()
    {
        $cat = Category::pluck('name','id');
        // dd($cat);
        return view('articles.create')->with('categories',$cat);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'desc' => 'required',
            'cat' => 'required',
        ]);

        // dd( request()->all() );

        // create article
        $article = new Article();
        $article->title = $request->input('title');
        $article->user_id = Auth::user()->id;
        $article->description = $request->input('desc');
        $article->category_id = $request->input('cat');
        $article->save();

        return redirect('/articles')->with('success', 'Articles Created');
    }

    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show')->with('article',$article);
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit')->with('article',$article);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'desc' => 'required',
        ]);

        // update article
        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->description = $request->input('desc');
        $article->category_id = $request->input('cat');
        $article->save();

        return redirect('/articles')->with('success', 'Articles Updated');
    }


    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect('/articles')->with('success', 'Articles Deleted');
    }
}
