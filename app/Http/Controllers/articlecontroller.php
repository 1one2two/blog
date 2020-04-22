<?php

namespace App\Http\Controllers;

use Toastr;
use Redirect;
use App\article;
use DateTime;
use Jenssegers\Agent\Agent;
use Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;
use Illuminate\Mail\Markdown;

class articlecontroller extends Controller
{
    public function show($id)
    {
        $ti = new DateTime();
        DB::table('user_visit_log')->insert(array(
            'User-Agent' => request()->header('User-Agent', ""),
            'Ip' => $_SERVER["HTTP_CF_IPCOUNTRY"],
            'Referer' => request()->header('Referer', ""),
            'Target' => request()->fullUrl(),
            'created_at' => $ti->format('Y-m-d H:i:s'),
            'updated_at' => $ti->format('Y-m-d H:i:s'),
        ));

        DB::table('articles')->where('id', '=', $id)->update(array('visit' => DB::raw('visit + 1')));

        $articles = DB::table('articles')
            ->where('articles.id', '=', ($id))
            ->join('users', 'users.id', 'articles.author_id')
            ->select('articles.id as id', 'title as title', 'articles.content as content', 'users.name as name', 'articles.updated_at as time')
            ->get();

        $more_articles = DB::table('articles')
            ->select('articles.id as id', 'title as title', 'articles.created_at as time')->inRandomOrder()->limit(6)->get();

        $cou = DB::table('articles')->count();

        //$tasks = DB::select('SELECT articles.id as id, articles.title, articles.content, users.name FROM `articles` INNER JOIN users ON users.id = articles.author_id WHERE articles.id = ' . $id)->paginate(1);
        $msg = DB::select('SELECT blog_users.name as name, blog_messages.content FROM `blog_messages` INNER JOIN blog_users ON blog_users.id = blog_messages.user_id WHERE `article_id` = ' . $id);

        $tg = DB::select('SELECT blog_tags.t as tg, blog_tags.id as i FROM blog_article_tags INNER JOIN blog_tags ON blog_article_tags.tag_id=blog_tags.id WHERE blog_article_tags.art_id = ' . $id);
        // $tg_ = DB::table('article_tags')
        //     ->where('art_id', '=', $id)
        //     ->join('tags', 'tags.id', 'article_tags.art_id')
        //     ->select('tags.t as tg')
        //     ->get();

        if (count($articles) > 0) {
            return view('show', [
                'articles' => $articles,
                'more_articles' => $more_articles,
                'cou' => $cou,
                'msg' => $msg,
                'id' => $id,
                'tg' => $tg,
                'i' => 0,
            ]);
        } else {
            return Redirect::to(action('HomeController@index'));
        }
    }

    /*
    public function __construct()
    {
        $this->middleware('auth');
    }//*/
}
