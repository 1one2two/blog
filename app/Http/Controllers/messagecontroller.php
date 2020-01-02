<?php

namespace App\Http\Controllers;

use App\message;
use Request;

use Redirect;
use App\article;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;


class messagecontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function post()
    {
        $articles = DB::select("SELECT articles.id as id, articles.title, articles.content, users.name FROM `articles` INNER JOIN users ON users.id = articles.author_id");
        return view('post', [
            'articles' => $articles,
        ]);
    }

    public function create() {
        $data = request()->validate([
            'content' => 'required',
        ]);

        $data = new message;
        $data->article_id = request()->article_id;
        $data->user_id = auth()->user()->id;
        $data->content = request()->content;
        $data->like = 0;
        $data->dislike = 0;
        $data->save();

        return redirect('/article/'.request()->article_id);
    }
}
