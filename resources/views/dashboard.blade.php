@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-light">
                <div class="card-body" style="background-color: #f8f9fc;">
                    <table class="table">
                        <thead>
                            <tr>
                                <!-- <th>id</th> -->
                                <th>title</th>
                                <th>view</th>
                                <th>comment</th>
                                <th>edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ls as $l)
                            <tr>
                                <!-- <td>{{ $l->id }}</td> -->
                                <td>{{ $l->title }}</td>
                                <td>{{ $l->visit}} </td>
                                <td>{{ $l->comment }}</td>
                                <td><input type="button" class="btn btn-primary" onclick="javascript:location.href='/edit/{{ $l->id }}'" value="Edit"></input></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection