@extends('layouts.dashboard')

@section('content')
    <pre>
        {{ Session::get('errors') }}
    </pre>
    <h2>Create project</h2>
    <form action="{{ route('projects.store') }}" method="POST">
        @method('POST')
        @csrf
        <div class="form-group">
            <label for="inputName">Name</label>
            <input id="inputName" type="text" name="name" value="" class="form-control">
        </div>
        <div class="form-group">
            <label for="inputDescription">Description</label>
            <textarea id="inputDescription" name="description" cols="30" rows="10" style="resize: none;" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="inputUrl">Url</label>
            <input id="inputUrl" type="text" name="url" value="" class="form-control">
        </div>
        <div class="form-group">
            <label for="inputPhoto">Photo</label>
            <input id="inputPhoto" type="file" name="photo" value="" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Add</button>
    </form>
@endsection
