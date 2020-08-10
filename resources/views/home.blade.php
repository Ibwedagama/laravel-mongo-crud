@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post List</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Content</th>
                                <th scope="col">Date Created</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($posts as $p)
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>{{$p->title}}</td>
                                <td>{{$p->content}}</td>
                                <td>{{$p->created_at}}</td>
                                <td>
                                    <a href="{{route('post.form', $post = $p->_id)}}"
                                        class="badge badge-warning">Update</a>
                                    <a href="{{route('post.delete', $post = $p->_id)}}"
                                        class="badge badge-danger">Delete</a>
                                </td>
                            </tr>
                            @php
                            $i++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
