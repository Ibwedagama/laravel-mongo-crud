@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Form Post</div>

                <div class="card-body">
                    @if (isset($data))
                    <form action="{{ route('post.update', $data->_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Post Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{$data->title}}">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="content"
                                rows="3">{{$data->content}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-warning btn-block">Update</button>
                    </form>
                    @else
                    <form action="{{ route('post.save') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Post Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
