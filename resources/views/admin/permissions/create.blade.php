
@extends('admin.layouts.app')

@section('main-section')
<main id="main" class="main">
    <div class="bg-light p-4 rounded">
        <h2>Add new permission</h2>
        <div class="lead">
            Add new permission.
        </div>

        <div class="container mt-4">

            <form  action="{{route('permissions.store')}}" method="POST" id="add_form"> 


                @csrf
                @method('GET')

                <!-- <input type="hidden" name="_method" value="get"> -->

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ old('name') }}" 
                        type="text" 
                        class="form-control" 
                        name="name" 
                        placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary"></button>
                <a href="{{ route('permissions') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
</main>





@endsection