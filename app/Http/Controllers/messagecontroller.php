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
        // $articles = DB::select("SELECT blog_articles.id as id, blog_articles.title, blog_articles.content, blog_users.name FROM `blog_articles` INNER JOIN blog_users ON blog_users.id = blog_articles.author_id");
        $tg = DB::select("SELECT * FROM `blog_tags`");
        /* return view('post', [
            'articles' => $articles,
        ]); */
        return view('post', [
            'tg' => $tg,
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
