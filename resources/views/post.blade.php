@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post article</div>

                <div class="card-body">
                    <form action="/article" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelp" placeholder="Enter title">
                            @error('title')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <input type="text" class="form-control" name="content" id="content" aria-describedby="contentHelp" placeholder="Enter content">
                            @error('content')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Create article</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection