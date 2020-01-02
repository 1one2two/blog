@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New article</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }} Where is this?
                    </div>
                    @endif

                    @if (Auth::check() && auth()->user()->authority == "1")
                    <a href="/article/post" class="btn btn-primary btn-center">Post article</a>
                    @else
                    <div class="alert alert-danger" role="alert">
                        Permission denied
                    </div>
                    @endif
                </div>
            </div>
            <!--
            <br>
            <div class="card">
                <div class="card-header">Article list</div>

                <div class="card-body">
                    <table class="table table-striped table-light">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col col-auto">Auth</th>
                                <th scope="col col-3">Title</th>
                                @if ( $agent->isDesktop() == "1" )
                                <th scope="col col-6">Content</th>
                                @endif
                                <th scope="col col-lg-2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count( $articles ) > 0)
                            @foreach($articles as $article)
                            <tr>
                                <th scope="row">
                                    {{ $article->name }}
                                </th>
                                <td>
                                    {{ mb_substr( $article->title , 0, 5, "UTF-8") }}
                                </td>
                                @if ( $agent->isDesktop() == "1" )
                                <td>
                                    {{ mb_substr( $article->content , 0, 18, "UTF-8") }}
                                </td>
                                @endif
                                <td>
                                    <form action="/article/{{ $article->id }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-secondary">Read</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>-->
            <br>
            <div class="card">
                <div class="card-header">Article list</div>

                <div class="card-body">
                    <div>This pictures are from <a href="https://picsum.photos/">Lorem Picsum</a></div>
                    <div class="card-columns">
                        @foreach ($articles as $article)
                        <div class="card" data-link="/article/{{ $article->id }}">
                            <a class="urls" href="/article/{{ $article->id }}">
                                <img class="card-img-top" width="246" height="160" src="https://picsum.photos/246/160?random={{ $i++ }}" alt="Card image cap">
                            </a>
                            <div class="card-body new-wrap new-wrap1 bd-box">
                                <a href="/article/{{ $article->id }}">
                                    <h4>
                                        {{ mb_substr($article->title , 0, 99, "UTF-8") }}
                                    </h4>
                                </a>
                                <!--<p class="card-text">{{ mb_substr( $article->content , 0, 0, "UTF-8") }}</p>-->
                                <p class="card-text"><small class="text-muted">Create at {{ $article->time }}</small></p>
                                <a href="/article/{{ $article->id }}">Read more...
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-lg justify-content-center">
                        {{ $articles->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection