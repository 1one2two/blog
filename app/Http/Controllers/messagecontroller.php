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

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|max:30000000',
            'content' => 'required|max:30000000',
        ]);

        $art = new article;
        $art->author_id = auth()->user()->id;
        $art->title = request()->title;
        $art->content = request()->content;
        $art->save();

        $tg = DB::select("SELECT * FROM `blog_tags`");

        // dd(request()->all());

        foreach ($tg as $t) {
            $tmp = str_replace(' ', '_', $t->t);
            if (Request::has($tmp)) {
                DB::table('article_tags')->insert(
                    array('tag_id' => $t->id, 'art_id' => $art->id)
                );
            }
        }

        // "https://api.telegram.org/bot789858369:AAHRQgxv7M8Uno28GIOwz5E0tpSyqaXV09s/sendMessage?chat_id=@toolmanxyz&text=1234";
        // $client = new GuzzleHttp\Client('http://api.github.com/users/');
        // $response = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');
        // dd($response);

        session()->flash('status', 'OK!! Article post!');

        return redirect('/article/' . $art->id);
    }

    public function edit($id)
    {
        $article = DB::table('articles')->where('author_id', '=', auth()->user()->id)->where('id', '=', $id)->first();
        return view('edit', [
            'id' => $id,
            'title' => $article->title,
            'content' => $article->content,
        ]);
    }

    public function updates() {
        $data = request()->validate([
            'id' => 'required|max:6',
            'title' => 'required|max:30000000',
            'content' => 'required|max:30000000',
        ]);

        DB::table('articles')->where('id', '=', request()->id)->where('author_id', '=', auth()->user()->id)->update(array(
            'title' => request()->title,
            'content' => request()->content,
        ));

        session()->flash('status', 'OK!! Article update!');
        return redirect('/article/' . request()->id);
    }

    public function dashboard() {
        $ls = DB::table('articles')->where('author_id', '=', auth()->user()->id)->get();
        // dd($ls);
        return view('dashboard', array(
            'ls' => $ls,
        ));
    }

    public function create() {
        $data = request()->validate([
            'content' => 'required',
        ]);

        DB::table('articles')->where('id', '=', request()->article_id)->update(array('comment' => DB::raw('comment + 1')));

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
