@extends('admin.layouts.app')
@section('main-section')
    <div class="container">
        <div class="row ">
            <div class="col-lg-12">
                <div class="card shadow">
                    {{-- <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h3 class="card-title text-dark">Manage trainings</h3>
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ route('trainings.create') }}" class="btn btn-primary float-right add-btn"><i
                                        class="bi-plus-circle"></i> Add New Training</a>
                            </div>
                        </div>
                    </div> --}}
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-9">
                                <label for="training" class="training-label-text">Name of this training</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-3">
                                <label for="training" class="training-label-text">Estimated Time</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow mt-3 p-3">
                    <div class="row">
                        <div class="col-3 " style="border-right:1px solid rgb(193, 193, 193) ">
                            <p class="training-label-text ">Training steps</p>
                            <img src="storage/images/step.jpg" class="step-image" alt="" width="100px">
                            <p class="training-label-text">Step 1</p>
                            <img src="storage/images/step.jpg" class="step-image" alt="" width="100px">
                            <p class="training-label-text">Step 2</p>


                        </div>
                        <div class="col-9" id="step">
                            <h2 class="card-title">Step 3</h2>
                            <label for="step" class="training-label-text">Name of this step</label>
                            <input type="text" class="form-control ">
                            <div class="drop-zone step-image2">
                                <span class="drop-zone__prompt">Drop file here or click to upload</span>
                                <input type="file" name="avatar" class="drop-zone__input">
                            </div>

                            <textarea name="" id="" cols="30" rows="2" class="form-control"></textarea>
                            <button id="addmorestep" class="btn btn-primary btn-sm">Add More</button>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
