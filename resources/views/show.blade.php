@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Article</div>

                <div class="card-body">
                    @if (count( $articles ) > 0)
                    @foreach($articles as $article)
                    @if ($article->id == $id )
                    <b>Author:</b><br>
                    {{ $article->name }} <br><br>
                    <b>Title:</b><br>
                    {{ $article->title }} <br><br>
                    <b>Content:</b><br>
                    {{ $article->content }} <br>
                    @endif
                    @endforeach
                    @endif
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Add a public comment...</div>

                <div class="card-body">
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
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Message</div>

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
            <br>
            <nav aria-label="Page navigation example">
                <ul class="pagination pagination-lg justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection