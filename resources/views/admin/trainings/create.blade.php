@extends('admin.layouts.app')
@section('main-section')
    <div class="container">
        <div class="row ">

            <div class="col-lg-12">
                <form action="{{ route('trainings.store') }}" method="POST" id="add_form" enctype="multipart/form-data">
                    <div class="row m-2">
                        <div class="col-lg-10 col-7 mt-3">
                            <a href="{{ route('trainings.index') }}"><i class="bi bi-arrow-left"></i> Back To
                                Trainings</a>
                        </div>
                        <div class=" col-lg-2 col-5">
                            <button type="submit" id="add_btn" class="btn btn-dark   add-btn"> <i
                                    class="bi bi-plus-circle"></i> Save Data</button>
                        </div>
                    </div>
                    @csrf
                    <div class="card shadow mt-4">

                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-4">
                                    <label for="training" class="training-label-text">Name of this training</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="col-4">
                                    <label for="department" class="training-label-text">Select Department</label>
                                    <select name="department" class="form-control form-select">
                                        @foreach ($data as $department)
                                            <option value="{{ $department->id }}"
                                                {{ $department->id == $selected_department_id ? 'selected' : '' }}>
                                                {{ $department->dep_name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for="training" class="training-label-text">Estimated Time</label>
                                    <input type="number" class="form-control" name="estimated_time">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mt-3 p-3 appended-message">
                        <div class="row">
                            <div class="col-3 new-back" style="border-right:1px solid rgb(193, 193, 193) ">
                                <p class="training-label-text ">Training steps</p>
                                <img src="{{ asset('storage/images/step.jpg') }}" class="step-image" alt=""
                                    width="100px">
                                <p class="training-label-text">Step 1</p>
                                <img src="{{ asset('storage/images/guidance2.avif') }}" class="step-image" alt=""
                                    width="100px">
                                <p class="training-label-text">Step 2</p>
                                <img src="{{ asset('storage/images/guidance3.jpg') }}" class="step-image" alt=""
                                    width="100px">
                                <p class="training-label-text">Step 2</p>
                            </div>
                            <div class="col-9" id="step">
                                <h2 class="card-title">Step 1</h2>
                                <label for="step" class="training-label-text">Name of this step</label>
                                <input type="text" class="form-control" name="step_name[]">
                                <label for="step" class="training-label-text">Step-Numbers</label>
                                <input type="text" class="form-control" name="step_num[]">
                                <div class="drop-zone step-image2">
                                    <span class="drop-zone__prompt">Drop file here or click to upload</span>
                                    <input type="file" name="media[]" class="drop-zone__input">
                                </div>
                                <label for="step" class="training-label-text">Description</label>
                                <textarea id="" cols="30" rows="2" class="form-control" name="description[]"></textarea>
                                <div class="row">
                                    <div class="col-3 offset-9">
                                        <button type="button" id="addmorestep"
                                            class="styled-btn2 btn btn-primary btn-sm mt-4 ">
                                            <i class="bi bi-plus-circle"></i> Add

                                            More</button>
                                    </div>
                                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
@section('js')
    <script>
        //
    </script>
@endsection
