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
    @if ($posts->count() > 0)

      <table class="table">
        <thead>
          <th>Image</th>
          <th>Title</th>
          <th>Category</th>
          <th>Action</th>
        </thead>

        <tbody>
          @foreach ( $posts as $post )
          <tr>
            <td> <img src="{{ asset('storage/'.$post->image) }}" width="60px" height="60px" alt="image"></td>
            <td> {{ $post->title }}</td>
            <td> 
              <a href="{{ route('categories.edit', $post->category->id) }}">
                {{ $post->category->name }}</td>
              </a>
            </td>
            <td>
              <div class="btn-group">
                
                @if (!$post->trashed())
                  <a href="{{ route('posts.edit', $post->id) }}" type="button" class="btn btn-sm btn-info">Edit</a>
                @else
                  <form action="{{ route('restore-post', $post->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-sm btn-info">Restore</button>
                  </form>
                @endif

                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger ml-2">
                    {{ $post->trashed() ? 'Delete' : 'Trash' }}
                  </button>
                </form>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>  
    @else
    <h3 class="text-center alert alert-info">
      No posts yet.
    </h3>
    @endif
  </div>
</div>
@endsection
