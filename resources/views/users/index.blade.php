@extends('layouts.app')

@section('content')

<div class="card card-default">
  <div class="card-header">Users</div>
  <div class="card-body">
    @if ($users->count() > 0)

      <table class="table">
        <thead>
          <th>Image</th>
          <th>Name</th>
          <th>Email</th>
          <th>Action</th>
        </thead>

        <tbody>
          @foreach ( $users as $user )
          <tr>
            <td>

            </td>
            <td> {{ $user->name }} </td>
            <td> {{ $user->email }} </td>
            <td>
              @if (!$user->isAdmin())
            <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-info btn-sm">Make admin</button>
            </form>
              
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>  
    @else
    <h3 class="text-center alert alert-info">
      No users yet.
    </h3>
    @endif
  </div>
</div>
@endsection
