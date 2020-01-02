@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @error('title')
            <class class="alert alert-danger" role="alert">{{ $message }}</class>
            <br><br>
            @enderror
            
            @error('content')
            <br>
            <class class="alert alert-danger" role="alert">{{ $message }}</class>
            <br><br>
            @enderror
            <div class="card card-new-task">
                <div class="card-header">Post article</div>

                <div class="card-body">
                    <form action="/article" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelp" placeholder="Enter title">
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" rows="3" name="content" id="content" aria-describedby="contentHelp" placeholder="Enter content"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Create article</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection