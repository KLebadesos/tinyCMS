@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Profile</div>
                <div class="card-body">
                  @include('partials.error')
                  <form action="{{ route('update.users-profile') }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                  </div>

                  <div class="form-group">
                    <label for="about">About me</label>
                    <textarea cols="5" rows="5" class="form-control" name="about" id="about"> {{ $user->about }} </textarea>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm">Update profile</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
