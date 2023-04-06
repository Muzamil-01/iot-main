
@extends('admin.layouts.app')

@section('main-section')
    <div class="bg-light p-4 rounded">
        <h2>Edit permission</h2>
       
        <div class="container mt-4">
        <div class="card shadow-2-strong tab-1">
            <div class="card-body">

            <form method="POST" action="{{route('permissions.update', $permission->id)}}" data-id="{{$permission->id}}" id="edit_form">
                @method('head')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$permission->name}}" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                
                <div class="row">

            <div class="col-lg-9 col-7">
            <a href="{{ route('permissions') }}" class="btn btn-default mt-4">Back</a>

            </div>

            <div class=" col-lg-3 col-5">

            <button type="submit" style="margin-left: 30px;" class="btn btn-primary btn-sm float-right add-btn mt-4">Save</button>

            </div>

                </div>

            </form>
        </div>
        </div>
        </div>
    </div>
@endsection