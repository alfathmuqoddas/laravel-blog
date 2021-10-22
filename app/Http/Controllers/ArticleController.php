<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\User;
use Session;
use Auth;

class ArticleController extends Controller
{
    private function is_login()
    {
        if(Auth::user()){
            return true;
        }
        else {
            return false;
        }
    }

    public function show()
    {
    	$articles = Article::orderby('id', 'desc') -> get();
        return view('show', ['articles' => $articles]);
    }
    public function add()
    {
        if($this -> is_login()) {
            return view('add');
        } else {
            return redirect('/login');
        }
    }

    public function add_process(Request $article)
    {
    	Article::insert([
    		'title' => $article ->title,
    		'description' => $article ->description,
            'user_id' => auth()->user()->id
    	]);

    	return redirect() -> action('App\Http\Controllers\ArticleController@show');
    }

    public function detail($id)
    {
    	$article = Article::where('id', $id)->first();
    	return view('detail', ['article' => $article]);
    }

    public function show_by_admin()
    {

        if($this -> is_login()){
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            $articles = Article::orderby('id', 'desc')->get();
            return view('adminshow') -> with('articles', $user -> articles);
        } else {
            return redirect('/login');
        }
    	
    }

    public function edit($id)
    {
        if($this -> is_login()) {
           $article = Article::where('id', $id)->first();
            return view('edit', ['article'=>$article]); 
        } else {
            return redirect('/login');
        }
    	
    }

    public function edit_process(Request $article)
    {
    	$id = $article -> id;
    	$title = $article -> title;
    	$description = $article -> description;
    	Article::where('id', $id) -> update(['title' => $title, 'description' => $description]);
    	Session::flash('success', 'Article was edited');
    	return redirect() -> action('App\Http\Controllers\ArticleController@show_by_admin');
    }

    public function delete($id)
    {
        if($this -> is_login()) {
            Article::where('id', $id) -> delete();
            Session::flash('success', 'Article was deleted');
            return redirect() -> action('App\Http\Controllers\ArticleController@show_by_admin');
        } else {
            return redirect('/login');
        }
    }
}
