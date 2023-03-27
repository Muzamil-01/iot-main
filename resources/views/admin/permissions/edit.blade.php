
@extends('admin.layouts.app')

@section('main-section')
<main id="main" class="main">
    <div class="bg-light p-4 rounded">
        <h2>Edit permission</h2>
        <div class="lead">
            Editing permission.
        </div>

        <div class="container mt-4">

            <form method="POST" action="{{route('permissions.update', $permission->id)}}" data-id="{{$permission->id}}" id="edit_form">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$permission->name}}" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Save permission</button>
                <a href="{{ route('permissions') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
</main>
@endsection