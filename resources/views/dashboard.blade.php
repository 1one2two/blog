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
                                <th>mesg</th>
                                <th>edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ls as $l)
                            <tr>
                                <!-- <td>{{ $l->id }}</td> -->
                                <td><a href="/article/{{ $l->id }}">{{ $l->title }}</a></td>
                                <td>{{ $l->visit}} </td>
                                <td>{{ $l->comment }}</td>
                                <td class="p-1">
                                    <!-- <input type="button" class="btn btn-primary" onclick="javascript:location.href='/edit/{{ $l->id }}'" value="Edit"></input> -->
                                    <!-- <a href="/edit/{{ $l->id }}">Edit</a> -->
                                    <a href="/edit/{{ $l->id }}" class="btn btn-light" style="text-align:center;">Edit</a>
                                </td>
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