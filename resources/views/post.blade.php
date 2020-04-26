@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @error('title')
            <div class="alert alert-danger alert-block" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @enderror

            @error('content')
            <div class="alert alert-danger alert-block" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @enderror
            <div class="card border-light">
                <div class="card-header" style="background-color: #f8f9fc; font-size: 1.5rem; line-height: 1.35;">Post article</div>

                <div class="card-body" style="background-color: #f8f9fc">
                    <form action="/article" method="POST">
                        @csrf
                        <!-- Edit title -->
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelp" placeholder="Enter title" autocomplete="off">
                        </div>
                        <!-- End edit title -->

                        <!-- Edit content -->
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" rows="10" name="content" id="content" aria-describedby="contentHelp" placeholder="Enter content" autocomplete="off"></textarea>
                            <small>Can use class="ct" to center the text.</small>
                        </div>
                        <!-- End edit content -->

                        <!-- Edit tags -->
                        <section class="section-preview">
                            @foreach ($tg as $t)
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="inp_{{ $t->t }}" name="{{ $t->t }}">
                                <label class="custom-control-label" for="inp_{{ $t->t }}">{{ $t->t }}</label>
                            </div>
                            @endforeach
                        </section>
                        <!-- End edit tags -->

                        <button type="submit" class="btn btn-primary" style="margin: 25px 0px;">Create article</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection