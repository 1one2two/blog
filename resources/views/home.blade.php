@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="border: 0px;">
                <!-- <div class="card-header" style="background-color: #fff; border-bottom-width: 2px; font-size: 1.5rem; line-height: 1.35;">ARTICLE LIST</div>
                <div class="py-2" style="background-color: #fff;"></div> -->
                <div class="card-body p-2" style="background-color: #EBEBEB">
                    <!-- <div>This pictures are from <a href="https://picsum.photos/">Lorem Picsum</a></div> -->
                    <div class="card-columns">
                        @foreach ($articles as $article)
                        <div class="rounded-lg">
                            <div class="card" data-link="/article/{{ $article->id }}" style="border: 1px solid rgb(212, 212, 212); box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px;">
                                <div style="overflow: hidden;" width="340" height="210">
                                    <a class="urls pic" href="/article/{{ $article->id }}">
                                        <img class="card-img-top" width="340" height="210" src="https://picsum.photos/340/210?random={{ $i++ }}" alt="{{ $article->title }}" title="{{ $article->title }}" onmouseover="transform: scale(1.5);" onmouseout="transform: scale(1);"></img>
                                    </a>
                                </div>
                                <div class="card-body" style="background-color: #fff;">
                                    <a href="/article/{{ $article->id }}" aria-label="{{ $article->title }}">
                                        <div style="height: 120px">
                                            <h4 style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; max-width: 320px; min-height:75px; font-size: 1.5rem;">
                                                {{ $article->title }}
                                            </h4>
                                            <div class="pt-2 font-weight-light">
                                                <div class="ml-0 float-left">
                                                    <svg height="12px" viewBox="0 0 384 384" width="12px" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="m343.59375 101.039062c-7.953125 3.847657-11.28125 13.417969-7.433594 21.367188 10.511719 21.714844 15.839844 45.121094 15.839844 69.59375 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c36.558594 0 70.902344 11.9375 99.328125 34.519531 6.894531 5.503907 16.976563 4.351563 22.480469-2.566406 5.503906-6.914063 4.351562-16.984375-2.570313-22.480469-33.652343-26.746094-76-41.472656-119.238281-41.472656-105.863281 0-192 86.136719-192 192s86.136719 192 192 192 192-86.136719 192-192c0-29.335938-6.40625-57.449219-19.039062-83.527344-3.839844-7.96875-13.441407-11.289062-21.367188-7.433594zm0 0" />
                                                        <path d="m192 64c-8.832031 0-16 7.167969-16 16v112c0 8.832031 7.167969 16 16 16h80c8.832031 0 16-7.167969 16-16s-7.167969-16-16-16h-64v-96c0-8.832031-7.167969-16-16-16zm0 0" /></svg>
                                                    <a> {{ $article->time }} </a>
                                                </div>
                                                <div class="mr-0 float-right icon">
                                                    <a class="mr-1">

                                                        <!-- <img width="12px" height="12px" src="data:image/png;base64,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" /> -->
                                                        {{-- $article->good --}}
                                                    </a>
                                                    <a class="mr-1">
                                                        <!-- Visit -->
                                                        <img width="12px" height="12px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDk2IDk2IiBoZWlnaHQ9Ijk2cHgiIGlkPSJleWUiIHZlcnNpb249IjEuMSIgdmlld0JveD0iMCAwIDk2IDk2IiB3aWR0aD0iOTZweCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+PHBhdGggZD0iTTQ4LDIwYzIxLjE1LDAsMzQuNTAyLDE5Ljk5OCwzOC45OTgsMjhDODIuNDk0LDU2LjAxNiw2OS4xNDUsNzYsNDgsNzZDMjYuODUzLDc2LDEzLjUwMyw1Ni4xMTgsOS4wMDMsNDguMTQ5ICBDMTMuNSw0MC4xMDEsMjYuODUzLDIwLDQ4LDIwIE00OCwxMkMxNiwxMiwwLDQ4LjE2NiwwLDQ4LjE2NlMxNiw4NCw0OCw4NHM0OC0zNiw0OC0zNlM4MCwxMiw0OCwxMkw0OCwxMnoiLz48cGF0aCBkPSJNNDgsNDBjNC40MTEsMCw4LDMuNTg5LDgsOHMtMy41ODksOC04LDhzLTgtMy41ODktOC04UzQzLjU4OSw0MCw0OCw0MCBNNDgsMzJjLTguODM2LDAtMTYsNy4xNjQtMTYsMTYgIGMwLDguODM3LDcuMTY0LDE2LDE2LDE2YzguODM3LDAsMTYtNy4xNjMsMTYtMTZDNjQsMzkuMTY0LDU2LjgzNywzMiw0OCwzMkw0OCwzMnoiLz48L3N2Zz4=" />
                                                        {{ $article->visit }}
                                                    </a>
                                                    <svg height="12px" viewBox="-21 -47 682.66669 682" width="12px" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="m552.011719-1.332031h-464.023438c-48.515625 0-87.988281 39.464843-87.988281 87.988281v283.972656c0 48.414063 39.300781 87.816406 87.675781 87.988282v128.863281l185.191407-128.863281h279.144531c48.515625 0 87.988281-39.472657 87.988281-87.988282v-283.972656c0-48.523438-39.472656-87.988281-87.988281-87.988281zm50.488281 371.960937c0 27.835938-22.648438 50.488282-50.488281 50.488282h-290.910157l-135.925781 94.585937v-94.585937h-37.1875c-27.839843 0-50.488281-22.652344-50.488281-50.488282v-283.972656c0-27.84375 22.648438-50.488281 50.488281-50.488281h464.023438c27.839843 0 50.488281 22.644531 50.488281 50.488281zm0 0" />
                                                        <path d="m171.292969 131.171875h297.414062v37.5h-297.414062zm0 0" />
                                                        <path d="m171.292969 211.171875h297.414062v37.5h-297.414062zm0 0" />
                                                        <path d="m171.292969 291.171875h297.414062v37.5h-297.414062zm0 0" /></svg>
                                                    <a href="/article/{{ $article->id }}" target=""> {{ $article->cou }} </a>
                                                </div>
                                            </div>
                                            <!-- <div class="mr-1 mt-5 font-weight-bold text-right">
                                                <a href="/article/{{ $article->id }}">Read more >></a>
                                            </div> -->
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="py-2" style="background-color: #EBEBEB"></div>
                <!-- <div class="card border-light">
                    <div class="card-header" style="background-color: #fff; border-bottom-width: 2px; font-size: 1.5rem; line-height: 1.35;">POST ARTICLE</div>

                    <div class="card-body" style="background-color: #fff">
                        @if (Auth::check() && auth()->user()->authority == "1")
                        <a href="/article/post" class="btn btn-light" style="width: 100%; text-align:center;">Post article now</a>
                        @else
                        <a href="{{ route('login') }}" class="btn btn-light" style="width: 100%; text-align:center;">Log in to continue.</a>
                        @endif
                    </div>
                </div> -->

                <nav aria-label="Page navigation" style="background-color: #EBEBEB">
                    <ul class="pagination pagination-lg justify-content-center" style="background-color: #EBEBEB">
                        {{ $articles->links('pages') }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Ads -->
<!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle" style="display:block" data-ad-format="fluid" data-ad-layout-key="-4p+cj-4l-my+1ja" data-ad-client="ca-pub-1041011272242969" data-ad-slot="7555666320"></ins>
<script>
    (adsbygoogle = window.adsbygoogle || []).push({});
</script> -->
<!-- End Ads -->
@endsection

@section('title')
| home
@endsection