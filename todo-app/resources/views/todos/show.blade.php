{{-- Extend the master layout file --}}
@extends('./master')

{{-- Define the content section that will be injected into the master layout --}}
@section('content')

        {{-- Main container for the form --}}
        <div class="row my-4">
            <div class="col-md-6 m-auto">

                {{-- Card container for the form --}}
                <div class="card">
                    {{-- Card header --}}
                    <div class="card-header">
                        <h3 class="card-title">Todo Details</h3>
                    </div>

                    {{-- Card body --}}
                    <div class="card-body">
                        {{-- Title input field --}}
                        <div class="form-group mb-2">
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Todo Title" value="{{$todo->name}}" readonly disabled>

                        </div>

                        {{-- Description textarea field --}}
                        <div class="form-group mb-2">
                            <label for="description">Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="description" name="description" placeholder="Todo Description" readonly disabled>{{$todo->description}}</textarea>

                        </div>
                    </div>

                    {{-- Card footer with submit button --}}
                    <div class="card-footer">
                        <div class="form-group mb-2">
                            <a href="{{route('todos.index')}}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
