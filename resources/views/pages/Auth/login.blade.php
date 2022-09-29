@extends('layouts.empty')

@section('content')
    @if(Session::get('errors') || Session::get('message'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('errors') ? Session::get('errors') : Session::get('message') }}
        </div>
    @endif

    <form action="{{ route('login.auth') }}" method="POST">
        @csrf
        <img class="mb-4" src="https://getbootstrap.com//docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">© 2017–2022</p>
    </form>
@endsection
