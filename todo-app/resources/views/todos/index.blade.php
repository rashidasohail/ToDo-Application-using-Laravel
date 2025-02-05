{{-- Extend the master layout file --}}
@extends('./master')

{{-- Define the content section that will be injected into the master layout --}}
@section('content')

{{-- Row for displaying messages and the "Create Todo" button --}}
<div class="row my-2">
    <div class="col-xl-6">
        {{-- Display success message if it exists --}}
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        {{-- Display error message if it exists --}}
        @elseif(Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif
    </div>

    {{-- Column for the "Create Todo" button --}}
    <div class="col-xl-6 text-end">
        <a href="{{ route('todos.create') }}" class="btn btn-primary">Create Todo</a>
    </div>
</div>

{{-- Table to display the list of todos --}}
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            {{-- Table headers --}}
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Completed</th>
            <th>Action</th>
        </thead>
        <tbody>
            {{-- Loop through the todos --}}
            @forelse($todos as $todo)
                <tr>
                    {{-- Display todo ID --}}
                    <td>{{ $todo->id }}</td>
                    {{-- Display todo title --}}
                    <td>{{ $todo->name }}</td>
                    {{-- Display todo description --}}
                    <td>{{ $todo->description }}</td>
                    {{-- Display whether the todo is completed --}}
                    <td>{{ $todo->is_completed ? 'Yes' : 'No' }}</td>
                    {{-- Action buttons for each todo --}}
                    <td>
                        {{-- Form for deleting a todo --}}
                        <form action="{{ route('todos.destroy', $todo->id) }}" method="POST">
                            @csrf {{-- CSRF token for security --}}
                            @method('DELETE') {{-- Use the DELETE method --}}
                            {{-- View button --}}
                            <a href="{{ route('todos.show', $todo->id) }}" class="btn btn-info">View</a>
                            {{-- Edit button --}}
                            <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-success">Edit</a>
                            {{-- Delete button with confirmation --}}
                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            {{-- Display a message if no todos are found --}}
            @empty
                <tr>
                    <td colspan="5">
                        <p class="text-danger">No todo found!</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
