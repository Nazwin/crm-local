@extends('layouts.dashboard')

@section('content')

    @if($message = Session::get('message'))
        @include('components.alert')
    @endif

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Projects</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('projects.create') }}" class="btn btn-info">Create</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Url</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->name }}</td>
                <td>{{ $project->description }}</td>
                <td>{{ $project->url }}</td>
                <td>
                    <div class="position-relative" style="width: 75px; height: 75px; overflow: hidden;">
                        <img src="{{ $project->photo }}" alt="" style="object-fit: cover; width: 100%; height: 100%; object-position: center;">
                    </div>
                </td>
                <td>
                    <a href="{{ route('projects.edit', ['project' => $project->id]) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('projects.destroy', ['project' => $project->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {!! $projects->links() !!}
    </div>
@endsection
