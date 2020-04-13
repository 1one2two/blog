@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-light">
                <div class="card-header" style="background-color: #f8f9fc; border-bottom-width: 2px; font-size: 1.5rem; line-height: 1.35;">Article List</div>

                <div class="card-body" style="background-color: #f8f9fc">
                    <!-- <div>This pictures are from <a href="https://picsum.photos/">Lorem Picsum</a></div> -->
                    <div class="card-columns">
                        @foreach ($articles as $article)
                        <div class="rounded-lg border border-light">
                            <div class="card" data-link="/article/{{ $article->id }}">
                                <a class="urls" href="/article/{{ $article->id }}">
                                    <img class="card-img-top" width="340" height="210" src="https://picsum.photos/340/210?random={{ $i++ }}" alt="Images from Lorem Picsum"></img>
                                </a>
                                <div class="card-body" style="background-color: #f8f9fc;">
                                    <a href="/article/{{ $article->id }}">
                                        <div style="height: 170px">
                                            <h4 style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; max-width: 300px; min-height: 75px;">
                                                {{ $article->title }}
                                            </h4>
                                            <div class="pt-4 font-weight-light">
                                                <div class="ml-1 float-left">
                                                    <svg height="14px" viewBox="0 0 384 384" width="18px" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="m343.59375 101.039062c-7.953125 3.847657-11.28125 13.417969-7.433594 21.367188 10.511719 21.714844 15.839844 45.121094 15.839844 69.59375 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c36.558594 0 70.902344 11.9375 99.328125 34.519531 6.894531 5.503907 16.976563 4.351563 22.480469-2.566406 5.503906-6.914063 4.351562-16.984375-2.570313-22.480469-33.652343-26.746094-76-41.472656-119.238281-41.472656-105.863281 0-192 86.136719-192 192s86.136719 192 192 192 192-86.136719 192-192c0-29.335938-6.40625-57.449219-19.039062-83.527344-3.839844-7.96875-13.441407-11.289062-21.367188-7.433594zm0 0" />
                                                        <path d="m192 64c-8.832031 0-16 7.167969-16 16v112c0 8.832031 7.167969 16 16 16h80c8.832031 0 16-7.167969 16-16s-7.167969-16-16-16h-64v-96c0-8.832031-7.167969-16-16-16zm0 0" /></svg>
                                                    <a> {{ $article->time }} </a>
                                                </div>

                                                <div class="mr-2 float-right icon">
                                                    <svg height="14px" viewBox="-21 -47 682.66669 682" width="18px" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="m552.011719-1.332031h-464.023438c-48.515625 0-87.988281 39.464843-87.988281 87.988281v283.972656c0 48.414063 39.300781 87.816406 87.675781 87.988282v128.863281l185.191407-128.863281h279.144531c48.515625 0 87.988281-39.472657 87.988281-87.988282v-283.972656c0-48.523438-39.472656-87.988281-87.988281-87.988281zm50.488281 371.960937c0 27.835938-22.648438 50.488282-50.488281 50.488282h-290.910157l-135.925781 94.585937v-94.585937h-37.1875c-27.839843 0-50.488281-22.652344-50.488281-50.488282v-283.972656c0-27.84375 22.648438-50.488281 50.488281-50.488281h464.023438c27.839843 0 50.488281 22.644531 50.488281 50.488281zm0 0" />
                                                        <path d="m171.292969 131.171875h297.414062v37.5h-297.414062zm0 0" />
                                                        <path d="m171.292969 211.171875h297.414062v37.5h-297.414062zm0 0" />
                                                        <path d="m171.292969 291.171875h297.414062v37.5h-297.414062zm0 0" /></svg>
                                                    <a href="#" target="">
                                                        {{ $article->cou }} comment
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="mr-1 mt-5 font-weight-bold text-right">
                                                <a href="/article/{{ $article->id }}">Read more >></a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="py-2" style="background-color: #f8f9fc"></div>
                <div class="card border-light">
                    <div class="card-header" style="background-color: #f8f9fc; border-bottom-width: 2px; font-size: 1.5rem; line-height: 1.35;">Post article</div>

                    <div class="card-body" style="background-color: #f8f9fc">
                        @if (Auth::check() && auth()->user()->authority == "1")
                        <a href="/article/post" class="btn btn-light" style="width: 100%; text-align:center;">Post article now</a>
                        @else
                        <a href="{{ route('login') }}" class="btn btn-light" style="width: 100%; text-align:center;">Login to continue.</a>
                        @endif
                    </div>
                </div>

                <nav aria-label="Page navigation" style="background-color: #f8f9fc">
                    <ul class="pagination pagination-lg justify-content-center">
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