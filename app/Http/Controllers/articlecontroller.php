<?php

namespace App\Http\Controllers;

use Redirect;
use App\article;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

class articlecontroller extends Controller
{
    public function post()
    {
        $articles = DB::select("SELECT articles.id as id, articles.title, articles.content, users.name FROM `articles` INNER JOIN users ON users.id = articles.author_id");
        return view('post', [
            'articles' => $articles,
        ]);
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|max:3000000000',
            'content' => 'required|max:3000000000',
        ]);

        $art = new article;
        $art->author_id = auth()->user()->id;
        $art->title = request()->title;
        $art->content = request()->content;
        $art->save();

        session()->flash('status', 'OK!! Article post!');

        return redirect('/article/' . $art->id);
    }

    public function show($id)
    {
        //$tasks = article::orderBy('created_at', 'asc')->get();
        $articles = DB::table('articles')
            ->where('articles.id', '=', ($id))
            ->join('users', 'users.id', 'articles.author_id')
            ->select('articles.id as id', 'title as title', 'articles.content as content', 'users.name as name')
            ->get();

        $cou = DB::table('articles')
            ->join('users', 'users.id', 'articles.author_id')
            ->select('articles.id as id', 'title as title', 'articles.content as content', 'users.name as name')
            ->get()->count();

        //$tasks = DB::select('SELECT articles.id as id, articles.title, articles.content, users.name FROM `articles` INNER JOIN users ON users.id = articles.author_id WHERE articles.id = ' . $id)->paginate(1);
        $msg = DB::select('SELECT users.name as name, messages.content FROM `messages` INNER JOIN users ON users.id = messages.user_id   WHERE `article_id` = ' . $id);
        if (count($articles) > 0) {
            return view('show', [
                'articles' => $articles,
                'cou' => $cou,
                'msg' => $msg,
                'id' => $id,
            ]);
        } else {
            return Redirect::to(action('HomeController@index'));
        }
    }
}
