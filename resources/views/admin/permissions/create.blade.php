@extends('admin.layouts.app')

@section('main-section')
    <div class="bg-light p-4  ">
        <h2>Add new permission</h2>

        <form action="{{ route('permissions.store') }}" method="POST" id="add_form">

            <div class="row m-2">
                <div class="col-lg-10 col-7 mt-3">
                    <a href="{{ route('permissions') }}"><i class="bi bi-arrow-left"></i> Back To
                        Permissions</a>
                </div>
                <div class=" col-lg-2 col-5">
                    <button type="submit" id="add_btn" class="btn btn-dark   add-btn" style="margin-left: -24px"> <i
                            class="bi bi-plus-circle"></i>
                        Save Data</button>
                </div>
            </div>
            <div class="container mt-4">
                <div class="container mt-4">
                    <div class="card shadow -2-strong tab-1 p-2">
                        <div class="card-body">


                            @csrf
                            @method('GET')

                            <!-- <input type="hidden" name="_method" value="get"> -->

                            <div class="mb-3">
                                <label for="name" class="form-label">Permission Name</label>
                                <input value="{{ old('name') }}" type="text" class="form-control" name="name"
                                    placeholder="Permission Name" required>

                                @if ($errors->has('name'))
                                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
