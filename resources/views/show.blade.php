@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <div class="card">
                <div class="card-header">Article</div>

                <div class="card-body">
                    @if (count( $articles ) > 0)
                    @foreach($articles as $article)
                    @if ($article->id == $id )
                    <h1 class="mt-4">{{ $article->title }}</h1>
                    <p class="lead">
                        by
                        <a href="#">{{ $article->name }}</a>
                    </p>
                    <hr> {{ $article->content }} <br>
                    @endif
                    @endforeach
                    @else
                    return reverse('/home');
                    @endif
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Leave a Comment:</div>

                <div class="card-body">
                    @if (Auth::check() && auth()->user()->authority == "1")
                    <form action="{{ action('messagecontroller@create') }}" method="POST">
                        @csrf
                        <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="content" id="exampleInputcontent" aria-describedby="contentHelp"></textarea>
                        </div>

                        @error('content')
                        <small class="text-danger">{{ $message }}<br></small>
                        @enderror
                        <input type="hidden" name="article_id" value="{{ $id }}"></input>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    @else
                    <div class="alert alert-danger" role="alert">
                        Permission denied
                    </div>
                    @endif
                </div>
            </div>
            <br>
            @if (count($msg) > 0)
            <div class="card">
                <div class="card-body"> 
                    @foreach ($msg as $m)
                    <div class="media mb-4">
                        <img class="d-flex mr-3 rounded-circle" src="https://imgur.com/tfE0JLe.jpg" width="50" height="50" alt="">
                        <div class="media-body">
                            <h5 class="mt-0">{{ $m->name }}</h5>
                            {{ $m->content }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            <br>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center pagination-lg">
                    @if (intval($id) > 1)
                    <li class="page-item">
                        <a class="page-link" href="{{ intval($id) - 1 }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="{{ intval($id) - 1 }}">{{ intval($id) - 1 }}</a></li>
                    @endif
                    <li class="page-item"><a class="page-link" href="#">{{$id}}</a></li>
                    @if (intval($id) < $cou) 
                    <li class="page-item"><a class="page-link" href="{{ intval($id) + 1 }}">{{ intval($id) + 1 }}</a></li>
                        <li class="page-item">
                            <a class="page-link" href="{{ intval($id) + 1 }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                        @endif
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection