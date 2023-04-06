
@extends('admin.layouts.app')

@section('main-section')


    <div class="bg-light p-4 rounded card-title">
        <h2>Add new permission</h2>
        <div class="lead card-title">
            Add new permission.
        </div>

        <div class="container mt-4">
        <div class="container mt-4">
        <div class="card shadow-2-strong tab-1">
            <div class="card-body">
            <form  action="{{route('permissions.store')}}" method="POST" id="add_form"> 


                @csrf
                @method('GET')

                <!-- <input type="hidden" name="_method" value="get"> -->

                <div class="mb-3">
                    <label for="name" class="form-label">Permission Name</label>
                    <input value="{{ old('name') }}" 
                        type="text" 
                        class="form-control" 
                        name="name" 
                        placeholder="Permission Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary"> Save.. </button>
                <a href="{{ route('permissions') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
        </div>
        </div>
    </div>





@endsection