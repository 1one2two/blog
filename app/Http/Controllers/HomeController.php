<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $agent = new Agent();
        $tasks = DB::select('SELECT articles.id AS id, SUBSTR(articles.title, 1, 7) AS title, SUBSTR(articles.content, 1, 13) AS content, users.name AS name FROM `articles` INNER JOIN users ON users.id = articles.author_id');
        return view('home', [
            'articles' => $tasks,
            'agent' => $agent,
        ]);
    }
}
