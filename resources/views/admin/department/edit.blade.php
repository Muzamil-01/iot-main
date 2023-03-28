@extends('admin.layouts.app')

@section('main-section')
    <div class="container">
        <form action="{{ route('departments.update', $data->id) }}" method="POST" id="edit_form" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="dep_id" id="dep_id" value="{{ $data->id }}">

            <div class="row">
                <div class="col-lg-9 col-9">
                    <a href="{{ route('departments.index') }}"><i class="bi bi-arrow-left"></i> Back To Departments</a>
                </div>
                <div class=" col-lg-3 col-3">
                    <button type="submit" id="edit_employee_btn2" class="btn btn-dark  add-btn"> Save Changes</button>
                </div>
                <div class="col-lg-12">
                    <div class="card shadow mt-3">
                        <div class="row">
                            <div class="col-lg-8 col-6 m-4">
                                <h5 class="card-title">EDIT DEPARTMENT</h5>
                            </div>
                            <div class="col-lg-3 col-3 mt-2">

                            </div>
                        </div>
                        <div class="card-body mt-1" id="">
                            <div class="modal-body p-2   mb-5 ">
                                <div class="row">
                                    <div class="col-lg-4 mt-4">
                                        <label for="dep_name">Department Name</label>
                                        <input type="text" name="dep_name" class="form-control"
                                            placeholder="Department Name" value="{{ $data->dep_name }}" required>
                                    </div>
                                    <div class=" col-lg-4 mt-5 my-2">
                                        <label for="description">Department Description</label>
                                        <textarea type="text" name="description" class="form-control" placeholder="Department Description" required>
                                            {{ $data->description }}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
