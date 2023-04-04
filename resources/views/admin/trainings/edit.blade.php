@extends('admin.layouts.app')

@section('main-section')
    <div class="container">
        <form action="{{ route('trainings.update', $data->id) }}" method="POST" id="edit_form" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="emp_id" id="emp_id" value="{{ $data->id }}">

            <div class="row">
                <div class="col-lg-9 col-9">
                    <a href="{{ route('trainings.index') }}"><i class="bi bi-arrow-left"></i> Back To trainings</a>
                </div>
                <div class=" col-lg-3 col-3">
                    <button type="submit" id="edit_employee_btn2" class="btn btn-dark  add-btn">+ Save Data</button>
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

                                    <div class="col-lg-4 mt-4">
                                        <label for="name">Training Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Last Name" value="{{ $data->name }}" required>
                                    </div>
                                    <div class="my-1 col-lg-4 mt-4">
                                        <label for="email">Estimated_time</label>
                                        <input type="datetime-local" name="estimated_time" id="email"
                                            class="form-control" value="{{ $data->estimated_time }}">
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
