@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <button type="button" onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

            @if ($message = Session::get('status'))
            <div class="alert alert-success alert-block" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif

            <div class="card" style=" border: 1px solid rgb(212, 212, 212); box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px;">
                <!-- <div class="card-header"><b>Article</b></div> -->

                <div class="card-body blog-post" style="background-color: #fff;">
                    @if (count( $articles ) > 0)
                    @foreach($articles as $article)
                    @if ($article->id == $id )


                    <h1 class="blog-post-title">{{ $article->title }}</h1>
                    <p class="blog-post-meta">
                        By <a href="#">{{ $article->name }}</a>
                        on {{ $article->time }}
                    </p>
                    <!-- FB share button -->
                    <!-- <div id="fb-root"></div> -->
                    <!-- <div class="fb-share-button" data-href="https://blog.toolman.xyz/article/{{ $article->id }}" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fblog.toolman.xyz%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">分享</a></div> -->
                    <!-- End FB share button -->
                    <!-- Telegram share button -->
                    <!-- <script async src="https://telegram.org/js/telegram-widget.js?8" data-telegram-share-url="https://blog.toolman.xyz/article/{{ $article->id }}" data-text="notext"></script> -->
                    <!-- Emd Telegram share button -->
                    <!-- Line share button -->
                    <!-- <div class="line-it-button" data-lang="zh_Hant" data-type="share-a" data-ver="3" data-url="https://blog.toolman.xyz/article/{{ $article->id }}" data-color="default" data-size="small" data-count="false" style="display: none;"></div> -->
                    <!-- <script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script> -->
                    <!-- End Line share button -->

                    <!-- Sharingbutton Facebook -->
                    <a class="resp-sharing-button__link" href="https://facebook.com/sharer/sharer.php?u=https%3A%2F%2Fblog.toolman.xyz%2Farticle%2F{{ $article->id }}" target="_blank" rel="noopener" aria-label="">
                        <div class="resp-sharing-button resp-sharing-button--facebook resp-sharing-button--small">
                            <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z" /></svg>
                            </div>
                        </div>
                    </a>

                    <!-- Sharingbutton Twitter -->
                    <a class="resp-sharing-button__link" href="https://twitter.com/intent/tweet/?text={{ $article->title }}%20_%20toolman%20xyz&amp;url=https%3A%2F%2Fblog.toolman.xyz%2Farticle%2F{{ $article->id }}" target="_blank" rel="noopener" aria-label="">
                        <div class="resp-sharing-button resp-sharing-button--twitter resp-sharing-button--small">
                            <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M23.44 4.83c-.8.37-1.5.38-2.22.02.93-.56.98-.96 1.32-2.02-.88.52-1.86.9-2.9 1.1-.82-.88-2-1.43-3.3-1.43-2.5 0-4.55 2.04-4.55 4.54 0 .36.03.7.1 1.04-3.77-.2-7.12-2-9.36-4.75-.4.67-.6 1.45-.6 2.3 0 1.56.8 2.95 2 3.77-.74-.03-1.44-.23-2.05-.57v.06c0 2.2 1.56 4.03 3.64 4.44-.67.2-1.37.2-2.06.08.58 1.8 2.26 3.12 4.25 3.16C5.78 18.1 3.37 18.74 1 18.46c2 1.3 4.4 2.04 6.97 2.04 8.35 0 12.92-6.92 12.92-12.93 0-.2 0-.4-.02-.6.9-.63 1.96-1.22 2.56-2.14z" /></svg>
                            </div>
                        </div>
                    </a>

                    <!-- Sharingbutton E-Mail -->
                    <a class="resp-sharing-button__link" href="mailto:?subject={{ $article->title }}%20_%20toolman%20xyz&amp;body=https%3A%2F%2Fblog.toolman.xyz%2Farticle%2F{{ $article->id }}" target="_self" rel="noopener" aria-label="">
                        <div class="resp-sharing-button resp-sharing-button--email resp-sharing-button--small">
                            <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M22 4H2C.9 4 0 4.9 0 6v12c0 1.1.9 2 2 2h20c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zM7.25 14.43l-3.5 2c-.08.05-.17.07-.25.07-.17 0-.34-.1-.43-.25-.14-.24-.06-.55.18-.68l3.5-2c.24-.14.55-.06.68.18.14.24.06.55-.18.68zm4.75.07c-.1 0-.2-.03-.27-.08l-8.5-5.5c-.23-.15-.3-.46-.15-.7.15-.22.46-.3.7-.14L12 13.4l8.23-5.32c.23-.15.54-.08.7.15.14.23.07.54-.16.7l-8.5 5.5c-.08.04-.17.07-.27.07zm8.93 1.75c-.1.16-.26.25-.43.25-.08 0-.17-.02-.25-.07l-3.5-2c-.24-.13-.32-.44-.18-.68s.44-.32.68-.18l3.5 2c.24.13.32.44.18.68z" /></svg>
                            </div>
                        </div>
                    </a>

                    <!-- Sharingbutton Telegram -->
                    <a class="resp-sharing-button__link" href="https://telegram.me/share/url?text={{ $article->title }}%20|%20toolman%20xyz&amp;url=https%3A%2F%2Fblog.toolman.xyz%2Farticle%2F{{ $article->id }}" target="_blank" rel="noopener" aria-label="">
                        <div class="resp-sharing-button resp-sharing-button--telegram resp-sharing-button--small">
                            <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M.707 8.475C.275 8.64 0 9.508 0 9.508s.284.867.718 1.03l5.09 1.897 1.986 6.38a1.102 1.102 0 0 0 1.75.527l2.96-2.41a.405.405 0 0 1 .494-.013l5.34 3.87a1.1 1.1 0 0 0 1.046.135 1.1 1.1 0 0 0 .682-.803l3.91-18.795A1.102 1.102 0 0 0 22.5.075L.706 8.475z" /></svg>
                            </div>
                        </div>
                    </a>

                    <a href="https://social-plugins.line.me/lineit/share?url=https%3A%2F%2Fblog.toolman.xyz%2Farticle%2F{{ $article->id }}" target="_blank">
                        <img src="data:image/png;base64,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" class="no-shadow" style="width: 36px; height: 37.4px; border-bottom-right-radius: calc(0.35rem - 1px); border-top-right-radius: calc(0.35rem - 1px); border-bottom-left-radius: calc(0.35rem - 1px); border-top-left-radius: calc(0.35rem - 1px); margin: 0.5em;" alt="LINE share"/>
                    </a>

                    <!-- <ul class="share-buttons">
                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fblog.toolman.xyz%2F&quote=title" title="Share on Facebook" target="_blank"><img alt="Share on Facebook" src="../icons/Facebook.png" /></a></li>
                        <li><a href="https://twitter.com/intent/tweet?source=http%3A%2F%2Fblog.toolman.xyz%2F&text=title:%20http%3A%2F%2Fblog.toolman.xyz%2F" target="_blank" title="Tweet"><img alt="Tweet" src="../icons/Twitter.png" /></a></li>
                        <li><a href="mailto:?subject=title&body=:%20http%3A%2F%2Fblog.toolman.xyz%2F" target="_blank" title="Send email"><img alt="Send email" src="../icons/Email.png" /></a></li>
                    </ul> -->

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
                        <a href="/?t={{ $t->i }}" title="{{ $t->tg }}" class="tagg" style="display: inline-block;padding: 0 8px; border: 1px #d9dadd solid;margin: 5px 3px;background: #fff;background: -moz-linear-gradient(top, rgba(240, 244, 246, 1) 0%, rgba(234, 238, 240, 1) 100%);background: -webkit-linear-gradient(top, rgba(240, 244, 246, 1) 0%, rgba(234, 238, 240, 1) 100%);background: linear-gradient(to bottom, rgba(240, 244, 246, 1) 0%, rgba(234, 238, 240, 1) 100%);filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f0f4f6', endColorstr='#eaeef0', GradientType=0);border-radius: 4px;">{{ $t->tg }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <br>
            <div class="card" style="border: 1px solid rgb(212, 212, 212); box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px;">
                <div class="card-header" style="background-color: #fff; border-bottom-width: 2px; font-size: 1.5rem; line-height: 1.35;">MORE</div>

                <div class="card-body" style="background-color: #fff;">
                    <div class="card-columns" style="column-count: 2;">
                        @foreach($more_articles as $article)
                        <div class="card mb-3" style="background-color: #fff; border: 1px #d9dadd solid;">
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="/article/{{ $article->id }}">
                                        <img src="https://picsum.photos/300/185?random={{ $i++ }}" class="card-img h-100" alt="{{ $article->title }}">
                                    </a>
                                </div>
                                <div class="col-lg-6">
                                    <a href="/article/{{ $article->id }}">
                                        <p class="p-2 mt-2" style="background-color: #fff; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; max-width: 300px; height:80px; font-size: 16px;">{{ $article->title }}</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <br>
            <div class="card" style="border: 1px solid rgb(212, 212, 212); box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px;">
                <div class="card-header" style="background-color: #fff; border-bottom-width: 2px; font-size: 1.5rem; line-height: 1.35;">COMMENTS</div>

                <div class="card-body blog-post" style="background-color: #fff;">
                    @if (Auth::check() && auth()->user()->authority == "1")
                    <form action="{{ action('messagecontroller@create') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="content" id="exampleInputcontent" aria-describedby="contentHelp" style="background-color: #fff;"></textarea>
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
                @foreach($articles as $article)
                <div class="card-body" style="min-height: 190px; background-color: #fff;">
                    <script async src="https://comments.app/js/widget.js?2" data-comments-app-website="gr6kjD6m" data-limit="5" data-height="190" data-page-id="{{ $article->id }}"></script>
                </div>
                @endforeach
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
        <div class="col-md-4">
            <div class="card" style="background-color: #fff; padding: 1.25rem; border: 1px solid #d4d4d4; box-shadow: 0 1px 2px rgba(0,0,0,.1);">
                <div class="card-head" style="background-color: #fff; border-bottom-width: 2px; font-size: 1.3rem; line-height: 1.35; border-bottom: 1px solid rgba(0, 0, 0, 0.125);">Random articles</div>
                <div class="card-body" style="background-color: #fff; padding: 1.25rem 1.25rem 0 1.25rem;">
                    <div class="card-columns" style="column-count: 1;">
                        @foreach($more_articles as $article)
                        <!-- <div class="card mb-4" style="background-color: #fff; border: 1px #d9dadd solid;"> -->
                            <div class="row mb-2">
                                <div class="" style="width: 113px; height: 70px; position: absolute;">
                                    <a href="/article/{{ $article->id }}">
                                        <img src="https://picsum.photos/113/70?random={{ $i++ }}" class="card-img h-100" alt="{{ $article->title }}">
                                    </a>
                                </div>
                                <div class="" style="margin-left: 129px; min-height: 70px;">
                                    <a href="/article/{{ $article->id }}">
                                        <p class="mb-2" style="background-color: #fff; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; max-width: 300px; height:80px; font-size: 16px;">{{ $article->title }}</p>
                                    </a>
                                </div>
                            </div>
                        <!-- </div> -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->
    @endsection


    @section('title')
    @if (count( $articles ) > 0)
    @foreach($articles as $article)
     | {{ $article->title }}
    @endforeach
    @endif
    @endsection