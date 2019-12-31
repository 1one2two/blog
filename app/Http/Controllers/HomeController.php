<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
        $tasks = DB::select('SELECT articles.id as id, articles.title, articles.content, users.name FROM `articles` INNER JOIN users ON users.id = articles.author_id');
        return view('home', [
            'articles' => $tasks,
        ]);
    }
}
