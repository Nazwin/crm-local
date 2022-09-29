@extends('layouts.dashboard')

@section('content')
    <h2>Edit user {{ $user->id }}</h2>
    <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="inputName">Username</label>
            <input id="inputName" type="text" name="name" value="{{ $user->name }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input id="inputEmail" type="email" name="email" value="{{ $user->email }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="inputPhone">Phone</label>
            <input id="inputPhone" type="text" name="phone" value="{{ $user->phone }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="inputPhoto">Photo</label>
            <input id="inputPhoto" type="file" name="photo" value="{{ $user->photo }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
