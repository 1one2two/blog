<?php

namespace App\Http\Controllers;

use App\article;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /*

        SELECT a.id AS id, a.title as title, a.created_at as time, c.name as name, COALESCE(COUNT(b.id),0) AS cou
        FROM blog_articles as a
        LEFT JOIN blog_messages as b on a.id = b.article_id
        LEFT JOIN blog_users as c on c.id = a.author_id
        GROUP BY a.id;

        SELECT a.id AS id, a.title as title, a.created_at as time, c.name as name, COALESCE(COUNT(b.id),0) AS cou
        FROM blog_articles as a
        LEFT JOIN blog_messages as b on a.id = b.article_id
        LEFT JOIN blog_users as c on c.id = a.author_id
        LEFT JOIN blog_user_visit_log as d on d.Target = a.id
        GROUP BY a.id;

        */

        // $articles = DB::raw('SELECT blog_articles.id AS id, blog_articles.title as title, blog_articles.created_at as time, blog_users.name as name, COALESCE(COUNT(blog_messages.id),0) AS cou FROM blog_articles LEFT JOIN blog_messages on blog_articles.id = blog_messages.article_id LEFT JOIN blog_users on blog_users.id = blog_articles.author_id GROUP BY blog_articles.id ORDER BY blog_articles.id DESC');
        // $articles = DB::select($articles);

        //        $articles = DB::select('SELECT blog_articles.id AS id, blog_articles.title as title, blog_articles.created_at as time, blog_users.name as name, COALESCE(COUNT(blog_messages.id),0) AS cou FROM blog_articles LEFT JOIN blog_messages on blog_articles.id = blog_messages.article_id LEFT JOIN blog_users on blog_users.id = blog_articles.author_id GROUP BY blog_articles.id ORDER BY blog_articles.id DESC;')
        //                    ->paginate(16);
        $ti = new DateTime();
        DB::table('user_visit_log')->insert(array(
            'User-Agent' => request()->header('User-Agent', ""),
            'Ip' => $_SERVER["HTTP_CF_IPCOUNTRY"],
            'Referer' => request()->header('Referer', ""),
            'Target' => request()->fullUrl(),
            'created_at' => $ti->format('Y-m-d H:i:s'),
            'updated_at' => $ti->format('Y-m-d H:i:s'),
        ));

        // dd(request()->(v, ""));
        $v = "";
        if (request()->v) {
            $v = request()->v;
        }
        $articles = DB::table('articles')
            ->select(
                'articles.id as id',
                'users.name as name',
                'articles.title as title',
                'articles.content as content',
                DB::raw('SUBSTR(blog_articles.created_at, 1, 10) as time'),
                DB::raw('COUNT(blog_messages.id) AS cou'),
                'articles.visit as visit',
                'articles.good as good',
                'articles.bad as bad',
                'articles.share as share',
            )
            ->where('articles.title', 'LIKE', '%' . $v . '%')
            ->orWhere('articles.content', 'LIKE', '%' . $v . '%')
            ->leftJoin('messages', 'messages.article_id', 'articles.id')
            ->leftJoin('users', 'users.id', 'articles.author_id')
            ->groupBy('articles.id')
            ->orderBy('articles.id', 'desc')
            ->paginate(12);

        //$tasks = DB::select('SELECT articles.id AS id, SUBSTR(articles.title, 1, 7) AS title, SUBSTR(articles.content, 1, 13) AS content, users.name AS name FROM `articles` INNER JOIN users ON users.id = articles.author_id')->paginate(5);
        return view('home', [
            'articles' => $articles,
            'i' => 0,
        ]);
    }
}



/*

    public function __construct()
    {
        $this->middleware('auth');
    }
    */
