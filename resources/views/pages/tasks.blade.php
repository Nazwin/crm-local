@extends('layouts.dashboard')

@section('content')

    @if($message = Session::get('message'))
        @include('components.alert')
    @endif

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Tasks</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('tasks.create') }}" class="btn btn-info">Create</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Header</th>
                <th scope="col">Header</th>
                <th scope="col">Header</th>
                <th scope="col">Header</th>
                <th scope="col">Header</th>
                <th scope="col">Header</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->name }}</td>
                <td>{{ $task->date_start }}</td>
                <td>{{ $task->date_end }}</td>
                <td>{{ $task->status }}</td>
                <td>{{ $task->project_id }}</td>
                <td>
                    <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {!! $tasks->links() !!}
    </div>
@endsection
