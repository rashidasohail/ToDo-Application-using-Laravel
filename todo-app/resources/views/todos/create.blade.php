{{-- Extend the master layout file --}}
@extends('./master')

{{-- Define the content section that will be injected into the master layout --}}
@section('content')
    {{-- Form to create a new todo --}}
    <form action="{{ route('todos.store') }}" method="POST">
        {{-- CSRF token for security --}}
        @csrf

        {{-- Main container for the form --}}
        <div class="row my-4">
            <div class="col-md-6 m-auto">

                {{-- Card container for the form --}}
                <div class="card">
                    {{-- Card header --}}
                    <div class="card-header">
                        <h3 class="card-title">
                            Create Todo
                        </h3>
                    </div>

                    {{-- Card body --}}
                    <div class="card-body">
                        {{-- Title input field --}}
                        <div class="form-group mb-2">
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Todo Title">
                            {{-- Display validation error for the title field --}}
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Description textarea field --}}
                        <div class="form-group mb-2">
                            <label for="description">Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="description" name="description" placeholder="Todo Description"></textarea>
                            {{-- Display validation error for the description field --}}
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Card footer with submit button --}}
                    <div class="card-footer">
                        <div class="form-group mb-2">
                            <button type="submit" class="btn btn-success">Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
