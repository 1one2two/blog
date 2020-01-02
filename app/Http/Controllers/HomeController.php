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
        $sortBy = null;
        $agent = new Agent();
        $tasks = DB::table('articles')
                ->join('users', 'users.id', 'articles.author_id')
                ->select('articles.id as id', 'title as title', 'articles.content as content', 'users.name as name', 'articles.created_at as time')
                ->when($sortBy, function ($query, $sortBy) {
                    return $query->orderBy($sortBy);
                }, function ($query) {
                    return $query->orderBy('id');
                })
                ->paginate(6);
        //$tasks = DB::select('SELECT articles.id AS id, SUBSTR(articles.title, 1, 7) AS title, SUBSTR(articles.content, 1, 13) AS content, users.name AS name FROM `articles` INNER JOIN users ON users.id = articles.author_id')->paginate(5);
        return view('home', [ 
            'articles' => $tasks,
            'agent' => $agent,
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