<?php

namespace App\Http\Controllers;

use App\article;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
class HomeController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $agent = new Agent();
        $tasks = DB::table('articles')
                ->join('users', 'users.id', 'articles.author_id')
                ->select('articles.id as id', 'title AS title', 'articles.content as content', 'users.name as name')
                ->paginate(5);
        //$tasks = DB::select('SELECT articles.id AS id, SUBSTR(articles.title, 1, 7) AS title, SUBSTR(articles.content, 1, 13) AS content, users.name AS name FROM `articles` INNER JOIN users ON users.id = articles.author_id')->paginate(5);
        return view('home', [ 
            'articles' => $tasks,
            'agent' => $agent,
        ]);
    }
    
}



/*

    public function __construct()
    {
        $this->middleware('auth');
    }
    */