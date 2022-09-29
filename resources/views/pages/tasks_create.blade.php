@extends('layouts.dashboard')

@section('content')
    <h2>Create task</h2>

    @if(Session::get('errors') || Session::get('message'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('errors') ? Session::get('errors') : Session::get('message') }}
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">
        @method('POST')
        @csrf
        <div class="form-group">
            <label for="inputName">Name</label>
            <input id="inputName" type="text" name="name" value="" class="form-control" aria-describedby="nameHelp">
        </div>
        <div class="form-group">
            <label for="inputDescription">Description</label>
            <textarea id="inputDescription" name="description" cols="30" rows="10" style="resize: none;" class="form-control" aria-describedby="descriptionHelp"></textarea>
        </div>
        <div class="form-group">
            <label for="inputProjectId">Project</label>
            <select name="project_id" id="inputProjectId" class="form-control">
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Add</button>
    </form>
@endsection
