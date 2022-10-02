@extends('layouts.dashboard')

@section('content')
    <h2>Edit task {{ $task->id }}</h2>

    @if($message = Session::get('errors'))
        @include('components.alert')
    @endif

    <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="inputName">Name</label>
            <input id="inputName" type="text" name="name" value="{{ $task->name }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="inputDescription">Description</label>
            <textarea name="description" id="inputDescription" cols="30" rows="3" style="resize: none;" class="form-control">{{ $task->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="inputStatus">Status</label>
            <select name="status" id="inputStatus" class="form-control">
                <option value="waiting" {{ $task->status == 'waiting' ? 'selected' : '' }} >Waiting</option>
                <option value="process" {{ $task->status == 'process' ? 'selected' : '' }} >Process</option>
                <option value="ready" {{ $task->status == 'ready' ? 'selected' : '' }} >Ready</option>
                <option value="cancelled" {{ $task->status == 'cancelled' ? 'selected' : '' }} >Cancelled</option>
            </select>
        </div>
        <div class="form-group">
            <label for="inputProject">Project</label>
            <select name="project_id" id="inputProject" class="form-control">
                @foreach($projects as $project)
                <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }} >{{ $project->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="inputUserId">Users (use Ctrl + click for multiple)</label>
            <select name="user_id[]" id="inputUserId" class="form-control" multiple>
                @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $task->users->contains('id', $user->id) == 'cancelled' ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
