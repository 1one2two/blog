@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if (auth()->user()->authority == "1")
                    <a href="/article/post" class="btn btn-primary btn-center">Post article</a>
                    @else
                    <div class="alert alert-danger" role="alert">
                        Permission denied
                    </div>
                    @endif
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Article list</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <td>Auth</td>
                            <td>Title</td>
                            @if ( $agent->isDesktop() == "1" )
                            <td>Content</td>
                            @endif
                            <td></td>
                        </tr>
                        @if (count( $articles ) > 0)
                        @foreach($articles as $article)
                        <tr>
                            <td>
                                {{ $article->name }}
                            </td>
                            <td>
                                {{ $article->title }}
                            </td>
                            @if ( $agent->isDesktop() == "1" )
                            <td>
                                {{ $article->content }}
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
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection