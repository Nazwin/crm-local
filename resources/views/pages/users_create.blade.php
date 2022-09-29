@extends('layouts.dashboard')

@section('content')
    <h2>Create user</h2>

    @if($message = Session::get('message'))
        @include('components.alert')
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="inputName">Username</label>
            <input id="inputName" type="text" name="name" value="" class="form-control">
        </div>
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input id="inputEmail" type="email" name="email" value="" class="form-control">
        </div>
        <div class="form-group">
            <label for="inputPhone">Phone</label>
            <input id="inputPhone" type="text" name="phone" value="" class="form-control">
        </div>
        <div class="form-group">
            <label for="inputPhoto">Photo</label>
            <input id="inputPhoto" type="file" name="photo" value="" class="form-control">
        </div>
        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input id="inputPassword" type="password" name="password" value="" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Add</button>
    </form>
@endsection
