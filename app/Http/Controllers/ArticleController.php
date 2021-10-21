<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    	$articles = DB::table('article')->orderby('id', 'desc')->get();
        return view('show', ['articles'=>$articles]);
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
    	DB::table('article') -> insert([
    		'title' => $article ->title,
    		'description' => $article ->description
    	]);

    	return redirect() -> action('App\Http\Controllers\ArticleController@show');
    }

    public function detail($id)
    {
    	$article = DB::table('article')->where('id', $id)->first();
    	return view('detail', ['article' => $article]);
    }

    public function show_by_admin()
    {
        if($this -> is_login()){
            $articles = DB::table('article') -> orderby('id', 'desc')->get();
            return view('adminshow', ['articles' => $articles]);
        } else {
            return redirect('/login');
        }
    	
    }

    public function edit($id)
    {
        if($this -> is_login()) {
           $article = DB::table('article')->where('id', $id)->first();
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
    	DB::table('article') -> where('id', $id) -> update(['title' => $title, 'description' => $description]);
    	Session::flash('success', 'Article was edited');
    	return redirect() -> action('App\Http\Controllers\ArticleController@show_by_admin');
    }

    public function delete($id)
    {
        if($this -> is_login()) {
            DB::table('article') -> where('id', $id) -> delete();
            Session::flash('success', 'Article was deleted');
            return redirect() -> action('App\Http\Controllers\ArticleController@show_by_admin');
        } else {
            return redirect('/login');
        }
    }
}
