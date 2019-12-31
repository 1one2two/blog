<?php

namespace App\Http\Controllers;

use App\message;
use Request;
//use Illuminate\Http\Request;

class messagecontroller extends Controller
{
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
