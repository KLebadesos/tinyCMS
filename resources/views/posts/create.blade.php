@extends('layouts.app')


@section('content')
<div class="card card-default">
    <div class="card-header">Create Posts</div>
    <div class="card-body">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="5" rows="5" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="publish_at">Publish At</label>
                <input type="publish_at" class="form-control" name="publish_at" id="publish_at">
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>

            <div class="form-group">
               <button type="submit" class="btn btn-success">Add Post</button>
            </div>
        </form>
    </div>
</div>
@endsection