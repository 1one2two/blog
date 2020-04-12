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
                        <div class="">
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
                                                    <div class="text"> {{ $article->time }} </div>
                                                </div>

                                                <div class="mr-2 float-right icon">
                                                    <a href="#" target="">
                                                        {{ $article->cou }} 留言
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