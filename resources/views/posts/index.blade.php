@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end">
  <a href="{{ route('posts.create') }}" class="btn btn-success float-right mb-2">
    Add Posts
  </a>
</div>

<div class="card card-default">
  <div class="card-header">Posts</div>
  <div class="card-body">
    <table class="table">
      <thead>
        <th>Image</th>
        <th>Title</th>
        <th>Action</th>
      </thead>

      <tbody>
        @foreach ( $posts as $post )
        <tr>
          <td> <img src="{{ asset('storage/'.$post->image) }}" width="60px" height="60px" alt="image"></td>
          <td> {{ $post->title }}</td>
          <td>
            <div class="btn-group">
              <button type="button" class="btn btn-sm btn-info">Edit</button>
              <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger ml-2">Trash</button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>

    </table>
  </div>
</div>
@endsection
