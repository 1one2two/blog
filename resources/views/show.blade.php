@extends('layouts.app')

@section('content')

<style>
    a:visited {
        color: #116591;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            @if ($message = Session::get('status'))
            <div class="alert alert-success alert-block" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif

            <div class="card border-light" style="border: 0px;">
                <!-- <div class="card-header"><b>Article</b></div> -->

                <div class="card-body blog-post" style="background-color: #f8f9fc;">
                    @if (count( $articles ) > 0)
                    @foreach($articles as $article)
                    @if ($article->id == $id )
                    <h1 class="blog-post-title">{{ $article->title }}</h1>
                    <p class="blog-post-meta">
                        By <a href="#">{{ $article->name }}</a>
                        on {{ $article->time }}
                    </p>
                    <hr>
                    <div id="new-line" class="new-line">
                        {{ Illuminate\Mail\Markdown::parse($article->content) }}
                    </div>
                    <br>
                    @endif
                    @endforeach
                    @else
                    return reverse('/home');
                    @endif
                    <hr>
                    <div class="keywords">
                        Tags:
                        @foreach ($tg as $t)
                        <a href="#" title="{{ $t->tg }}" class="tagg" style="display: inline-block;color: rgb(15, 100, 145);padding: 0 8px;border: 1px #116591 solid;margin: 5px 3px;background: #f0f4f6;background: -moz-linear-gradient(top, rgba(240, 244, 246, 1) 0%, rgba(234, 238, 240, 1) 100%);background: -webkit-linear-gradient(top, rgba(240, 244, 246, 1) 0%, rgba(234, 238, 240, 1) 100%);background: linear-gradient(to bottom, rgba(240, 244, 246, 1) 0%, rgba(234, 238, 240, 1) 100%);filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f0f4f6', endColorstr='#eaeef0', GradientType=0);border-radius: 4px;">{{ $t->tg }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <br>
            <div class="card border-light">
                <div class="card-header" style="background-color: #f8f9fc; border-bottom-width: 2px; font-size: 1.5rem; line-height: 1.35;">Comment</div>

                <div class="card-body blog-post" style="background-color: #f8f9fc;">
                    @if (Auth::check() && auth()->user()->authority == "1")
                    <form action="{{ action('messagecontroller@create') }}" method="POST">
                        @csrf
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
                    <a href="{{ route('login') }}" class="btn btn-light" style="width: 100%; text-align:center;">Login to continue.</a>
                    @endif
                    <hr style="margin: 15px 0px 20px 0px;">
                    <!-- <div class="py-2"></div> -->
                    @foreach ($msg as $m)
                    <div class="media mb-4">
                        <img class="d-flex mr-3 rounded-circle" src="https://imgur.com/tfE0JLe.jpg" width="50" height="50" alt="">
                        <div class="media-body">
                            <h5 class="mt-0">{{ $m->name }}</h5>
                            <div class="new-line">{{ $m->content }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
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
                    @if (intval($id) < $cou) <li class="page-item"><a class="page-link" href="{{ intval($id) + 1 }}">{{ intval($id) + 1 }}</a></li>
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