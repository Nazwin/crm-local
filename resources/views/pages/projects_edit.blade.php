@extends('layouts.dashboard')

@section('content')
    <h2>Edit project {{ $project->id }}</h2>
    <form action="{{ route('projects.update', ['project' => $project->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="inputName">Name</label>
            <input id="inputName" type="text" name="name" value="{{ $project->name }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="inputDescription">Description</label>
            <textarea name="description" id="inputDescription" cols="30" rows="10" style="resize: none;" class="form-control">{{ $project->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="inputUrl">Url</label>
            <input id="inputUrl" type="text" name="url" value="{{ $project->url }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="inputPhoto">Photo</label>
            <input id="inputPhoto" type="file" name="photo" value="{{ $project->photo }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
