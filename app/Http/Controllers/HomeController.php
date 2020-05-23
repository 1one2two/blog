<?php

namespace App\Http\Controllers;

use Auth;
use App\article;
use Validator;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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
        $user_id = 0;
        if (Auth::check() != NULL)
            $user_id = Auth::id();
        else
            $user_id = 0;

        // $v = str_replace(['\\', '\'', '-', '_', '/', '*', '!', ':', '|', '@', '&', '+', '.', '$', '{', ';', '#', '^'],"",request()->header('User-Agent', ""), $n);
        // dd(Request()->headers[0]);

        // $validator = Validator::make(request()->headers->all(), [
        //     'dnt.*.' => // [
        //         'required',
                // "regex:/^Mozilla/5.0 (X11; Linux x86_64; rv:76.0) Gecko/20100101 Firefox/76.0$/i",
            // ],
            // 'host' => [
            //     'required',
            //     // "regex:/(['|-|_|\/|*|%|\s|\"|\\|\!])/i",
            //     "regex:/^https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,4}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/i",
            // ],
            // 'referer' => [
            //     "regex:/^https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,4}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/i",
            // ]
        // ]);

        // dd(Request()->headers->all());
        // $validator2 = Validator::make(Request()->fullUrl(), [
        //     'url' => [
        //         'required',
        //         "regex:/^https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,4}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/i",
        //     ]
        // ]);

        // if ($validator->fails() || $validator->fails()) {
        //     dd(request()->headers->all(), $validator);
        //     return redirect('home', 302);
        // }

        DB::table('user_visit_log')->insert(array(
            'User-Agent' => request()->header('User-Agent', ""),
            'Ip' => $_SERVER["HTTP_CF_IPCOUNTRY"],
            'Referer' => request()->header('Referer', ""),
            'Target' => request()->fullUrl(),
            'created_at' => $ti->format('Y-m-d H:i:s'),
            'user_id' => $user_id,
            // 'updated_at' => $ti->format('Y-m-d H:i:s'),
        ));

        // dd(request()->(v, ""));
        $v = "";
        $t = 0;
        $n = 0;
        if (request()->v || request()->v != "") {
            $v = request()->v;
            $v = str_replace(['\\', '\'', '-', '_', '/', '*', '!', ':', '|', '@', '&', '+', '.', '$', '{', ';', '#', '^'], "", $v, $n);
            $validator = Validator::make(request()->all(), [
                'v' => [
                    'required',
                    // "regex:/(['|-|_|\/|*|%|\s|\"|\\|\!])/i",
                ],
            ]);
            if ($validator->fails() || $n > 0) {
                return redirect('home', 302);
            }
        }
        if (request()->t) {
            $t = request()->t;
            $validator = Validator::make(request()->all(), [
                't' => [
                    'required',
                    'regex:/^[0-9]{1,4}$/i',
                ],
            ]);
            if ($validator->fails()) {
                return redirect('home', 302);
            }

            $articles = DB::table('articles')
                ->select(
                    'articles.id as id',
                    'articles.title as title',
                    'articles.content as content',
                    DB::raw('SUBSTR(blog_articles.updated_at, 1, 10) as time'),
                    'articles.comment as cou',
                    'articles.visit as visit',
                    'articles.good as good',
                    'articles.bad as bad',
                    'articles.share as share',
                )
                ->leftJoin('article_tags', 'article_tags.art_id', 'articles.id')
                ->where('article_tags.tag_id', '=', $t)
                ->Where('articles.content', 'LIKE', '%' . $v . '%')
                ->orderBy('articles.id', 'desc')
                ->paginate(12);
        } else {
            $articles = DB::table('articles')
                ->select(
                    'articles.id as id',
                    'articles.title as title',
                    'articles.content as content',
                    DB::raw('SUBSTR(blog_articles.updated_at, 1, 10) as time'),
                    'articles.comment as cou',
                    'articles.visit as visit',
                    'articles.good as good',
                )
                ->where('articles.title', 'LIKE', '%' . $v . '%')
                ->orWhere('articles.content', 'LIKE', '%' . $v . '%')
                ->orderBy('articles.id', 'desc')
                ->paginate(12);
        }

        $c = $articles->links('api.next_check')->paginator->lastPage();

        //$tasks = DB::select('SELECT articles.id AS id, SUBSTR(articles.title, 1, 7) AS title, SUBSTR(articles.content, 1, 13) AS content, users.name AS name FROM `articles` INNER JOIN users ON users.id = articles.author_id')->paginate(5);
        return view('home', [
            'articles' => $articles,
            'i' => 0,
            'c' => $c,
            'v' => $v,
            'tt' => $t,
        ]);
    }

    public function api()
    {
        $ti = new DateTime();
        $user_id = 0;
        if (Auth::check() != NULL)
            $user_id = Auth::id();
        else
            $user_id = 0;

        DB::table('user_visit_log')->insert(array(
            'User-Agent' => request()->header('User-Agent', ""),
            'Ip' => $_SERVER["HTTP_CF_IPCOUNTRY"],
            'Referer' => request()->header('Referer', ""),
            'Target' => request()->fullUrl(),
            'created_at' => $ti->format('Y-m-d H:i:s'),
            'user_id' => $user_id,
        ));

        $v = "";
        $n = 0;
        if (request()->v) {
            $v = request()->v;
            $v = str_replace(['\\', '\'', '-', '_', '/', '*', '!', ':', '|', '@', '&', '+', '.', '$', '{', ';', '#', '^'], "", $v, $n);
            $validator = Validator::make(request()->all(), [
                'v' => [
                    'required',
                    // "regex:/(['|-|_|\/|*|%|\s|\"|\\|\!])/i",
                ],
            ]);
            if ($validator->fails() || $n > 0) {
                return redirect('home', 302);
            }
        }

        if (request()->t) {
            $t = request()->t;
            $validator = Validator::make(request()->all(), [
                't' => [
                    'required',
                    'regex:/^[0-9]{1,4}$/i',
                ],
            ]);
            if ($validator->fails()) {
                return redirect('home', 302);
            }


            $articles = DB::table('articles')
                ->select(
                    'articles.id as id',
                    'articles.title as title',
                    'articles.content as content',
                    DB::raw('SUBSTR(blog_articles.updated_at, 1, 10) as time'),
                    'articles.comment as cou',
                    'articles.visit as visit',
                    'articles.good as good',
                    'articles.bad as bad',
                    'articles.share as share',
                )
                ->leftJoin('article_tags', 'article_tags.art_id', 'articles.id')
                ->where('article_tags.tag_id', '=', $t)
                ->Where('articles.content', 'LIKE', '%' . $v . '%')
                ->orderBy('articles.id', 'desc')
                ->paginate(12);
        } else {
            $articles = DB::table('articles')
                ->select(
                    'articles.id as id',
                    'articles.title as title',
                    'articles.content as content',
                    DB::raw('SUBSTR(blog_articles.updated_at, 1, 10) as time'),
                    'articles.comment as cou',
                    'articles.visit as visit',
                    'articles.good as good',
                )
                ->where('articles.title', 'LIKE', '%' . $v . '%')
                ->orWhere('articles.content', 'LIKE', '%' . $v . '%')
                ->orderBy('articles.id', 'desc')
                ->paginate(12);
        }

        //$tasks = DB::select('SELECT articles.id AS id, SUBSTR(articles.title, 1, 7) AS title, SUBSTR(articles.content, 1, 13) AS content, users.name AS name FROM `articles` INNER JOIN users ON users.id = articles.author_id')->paginate(5);
        return view('api.next', [
            'articles' => $articles,
        ]);
    }
}



/*

    public function __construct()
    {
        $this->middleware('auth');
    }
    */


$rules = [
    'edu_title'  => 'max:255',
    'edu_author' => 'max:10',
    'categories' => 'max:100',
    'file_name'  => 'nullable|file',
    'updated_at' => 'date|before:tomorrow'
];

$rules = [
    'edu_title'  => 'max:255',
    'edu_author' => 'max:10',
    'categories' => 'max:100',
    'file_name'  => 'nullable|file',
    'updated_at' => 'date|before:tomorrow',
    'file_name' => 'file'
];
