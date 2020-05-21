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
                <div class="card-header" style="background-color: #f8f9fc; font-size: 1.5rem; line-height: 1.35;">Edit article</div>

                <div class="card-body" style="background-color: #f8f9fc">
                    <form action="/edit" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id }}" />

                        <!-- Edit title -->
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelp" placeholder="Enter title" value="{{ $title }}" autocomplete="off">
                        </div>
                        <!-- End edit title -->

                        <!-- Edit content -->
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" rows="10" name="content" id="content" aria-describedby="contentHelp" placeholder="Enter content" autocomplete="off" onkeydown="if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}">{{ $content }}</textarea>
                        </div>
                        <!-- End edit content -->

                        <button type="submit" class="btn btn-primary" style="margin: 25px 0px;">Update article</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection