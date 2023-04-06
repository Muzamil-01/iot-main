@extends('admin.layouts.app')

@section('main-section')
    <div class="container">
        <form action="{{ route('trainings.update', $data->id) }}" method="POST" id="edit_form" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="emp_id" id="emp_id" value="{{ $data->id }}">

            <div class="row">
                <div class="col-lg-10 col-7 mt-3">
                    <a href="{{ route('trainings.index') }}"><i class="bi bi-arrow-left"></i>
                        Back
                        To trainings</a>
                </div>
                <div class=" col-lg-2 col-5">
                    <button type="submit" id="edit_employee_btn2" class="btn btn-dark   add-btn"
                        style="margin-left: -10px"><i class="bi bi-plus-circle"></i>
                        Save
                        Changes</button>
                </div>
                <div class="col-lg-12">
                    <div class="card shadow mt-3">
                        <div class="row">
                            <div class="col-lg-8 col-6 m-4">
                                <h5 class="card-title">EDIT TRAINING</h5>
                            </div>
                        </div>
                        <div class="card-body mt-1" id="">
                            <div class="modal-body p-2   mb-5 ">
                                <div class="row">
                                    <div class="col-lg-12 ">
                                        <label for="name">Training Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Last Name" value="{{ $data->name }}" required>
                                    </div>
                                    <div class=" col-lg-12 mt-4">
                                        <label for="email">Estimated_time</label>
                                        <input type="number" name="estimated_time" id="email" class="form-control"
                                            value="{{ $data->estimated_time }}">
                                    </div>
                                </div>
                            </div>
        </form>
        <div class="row">
            <div class="offset-10 col-2 mt-2">
                <a href="{{ route('steps.view', $data->id) }}" class="btn btn-dark btn-sm" style="margin-left: 60px">Edit
                    Steps</a>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
