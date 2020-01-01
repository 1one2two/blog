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
                        {{ session('status') }}
                    </div>
                    @endif

                    @if (Auth::check() && auth()->user()->authority == "1")
                    <a href="/article/post" class="btn btn-primary btn-center">Post article</a>
                    @else
                    <div class="alert alert-warning" role="alert">
                        Permission denied
                    </div>
                    @endif
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Article list</div>

                <div class="card-body">
                    <table class="table table-striped table-light">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Auth</th>
                                <th scope="col">Title</th>
                                @if ( $agent->isDesktop() == "1" )
                                <th scope="col">Content</th>
                                @endif
                                <th scope="col"></th>
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
                                        <button type="submit" class="btn btn-primary">Read</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pagination-sm justify-content-center">
                            {{ $articles->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection