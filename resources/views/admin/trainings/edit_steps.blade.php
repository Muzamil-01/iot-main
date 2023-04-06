@extends('admin.layouts.app')
@section('main-section')
    <div class="container">
        <div class="row ">

            <div class="col-lg-12">
                <form action="{{ route('steps.update', $data->id) }}" method="POST" id="add_form"
                    enctype="multipart/form-data">
                    <div class="row m-2">
                        <div class="col-lg-10 col-7 mt-3">
                            <a href="{{ url()->previous() }}"><i class="bi bi-arrow-left"></i> Back To
                                Steps</a>
                        </div>
                        <div class=" col-lg-2 col-5">
                            <button type="submit" id="edit_employee_btn2" class="btn btn-dark   add-btn"> <i
                                    class="bi bi-plus-circle"></i> Save Changes</button>
                        </div>
                    </div>
                    @csrf
                    <div class="card shadow mt-4">

                        <div class="card-body ">
                            <div class="row">
                                <h1 class="card-title mt-3 m-2">EDIT STEPS</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mt-3 p-3 appended-message">
                        <div class="row">
                            <div class="col-3 new-back" style="border-right:1px solid rgb(193, 193, 193) ">
                                <p class="training-label-text ">Training steps</p>
                                @if ($data->media && in_array(pathinfo($data->media, PATHINFO_EXTENSION), ['mp4', 'webm', 'ogg']))
                                    <video width="100%" controls>
                                        <source src="{{ asset('storage/images/' . $data->media) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @elseif ($data->media && in_array(pathinfo($data->media, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'avif']))
                                    <img src="{{ asset('storage/images/' . $data->media) }}" class="step-image m-2"
                                        alt="" width="100%">
                                @endif

                                <p class="training-label-text">Step 1</p>

                            </div>
                            <div class="col-9" id="step">
                                <h2 class="card-title">Step 1</h2>
                                <label for="step" class="training-label-text">Name of this step</label>
                                <input type="text" class="form-control" name="step_name" value="{{ $data->step_name }}">
                                <label for="step" class="training-label-text">Step-Numbers</label>
                                <input type="text" class="form-control" name="step_num" value="{{ $data->step_num }}">
                                <div class="drop-zone step-image2">
                                    <span class="drop-zone__prompt">Drop file here or click to upload</span>
                                    <input type="file" name="media" class="drop-zone__input">
                                </div>
                                <label for="step" class="training-label-text">Description</label>
                                <textarea id="" cols="30" rows="2" class="form-control" name="description">
                                    {{ $data->step_name }}
                                </textarea>
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
