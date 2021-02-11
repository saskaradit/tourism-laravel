<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show','categoriesArticles']]);
    }

    public function index()
    {
        $articles = Article::orderBy('created_at','desc')->paginate(5);
        return view('articles.index')->with('articles',$articles);
    }

    public function categoriesArticles($name){
        $category = Category::where('name',$name)->first();
        // dd($category->id);
        $articles = Article::where('category_id', $category->id)->paginate(5);;
        // dd($articles);
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
            'image' => 'image|nullable|max:1999'
        ]);

        // handle file
        if($request->hasFile('image')){
            // Get filename with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            // split file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // extenstion
            $ext = $request->file('image')->getClientOriginalExtension();
            // filename
            $fileNameStore = $fileName.'_'.time().'.'.$ext;
            // add image
            $path = $request->file('image')->storeAs('public/images',$fileNameStore);

        }else{
            $fileName = 'null';
        }

        // create article
        $article = new Article();
        $article->title = $request->input('title');
        $article->user_id = Auth::user()->id;
        $article->description = $request->input('desc');
        $article->category_id = $request->input('cat');
        $article->image = $fileNameStore;
        $article->save();

        return redirect('/articles')->with('success', 'Articles Created');
    }

    public function show($id)
    {
        $article = Article::find($id);
        // dd($article->category->name);
        return view('articles.show')->with('article',$article);
    }

    public function edit($id)
    {
        $article = Article::find($id);
        // Check User or Admin
        if(auth()->user()->id != $article->user_id && auth()->user()->role != 'Admin'){
            return redirect('/articles')->with('error', 'Unauthorized');
        }
        return view('articles.edit')->with('article',$article);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'desc' => 'required',
        ]);

        if($request->hasFile('image')){
            // Get filename with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            // split file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // extenstion
            $ext = $request->file('image')->getClientOriginalExtension();
            // filename
            $fileNameStore = $fileName.'_'.time().'.'.$ext;
            // add image
            $path = $request->file('image')->storeAs('public/images',$fileNameStore);

        }

        // update article
        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->description = $request->input('desc');
        $article->category_id = $request->input('cat');
        if($request->hasFile('image')){
            $article->image = $fileNameStore;
        }
        $article->save();

        return redirect('/articles')->with('success', 'Articles Updated');
    }


    public function destroy($id)
    {
        $article = Article::find($id);
        // dd($article);
        // Check User or Admin
        if(auth()->user()->id != $article->user_id || auth()->user()->role != 'Admin'){
            return redirect('/articles')->with('error', 'Unauthorized');
        }
        if($article->image != 'null'){
            Storage::delete('public/images/'.$article->image);
        }
        $article->delete();
        return redirect('/articles')->with('success', 'Articles Deleted');
    }
}
