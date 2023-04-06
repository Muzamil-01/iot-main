@extends('admin.layouts.app')
@section('css')
    <!-- DATE-PICKER -->
    <link rel="stylesheet" href="{{ asset('assets/wizard/vendor/date-picker/css/datepicker.min.css') }}">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{ asset('assets/wizard/css/style.css') }}">
@endsection
@section('main-section')
    <div class="container col-md-12">
        <div class="row ">
            <div class="col-lg-9 col-7 ">
                <a href="{{ route('trainings.index') }}"><i class="bi bi-arrow-left"></i> Back To Trainings</a>
            </div>

        </div>
        <div class="row ">
            <div class="card shadow mt-2">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="card-title">Training: {{ $data->name }} </h1>
                        </div>

                    </div>
                </div>
            </div>





            <div class="card shadow">
                {{-- <div class="card "> --}}
                <form action="" id="wizard">
                    <!-- SECTION 1 -->
                    @foreach ($child_data as $steps)
                        <h4></h4>
                        <section>
                            <div class="row">
                                <div class="col-6 mt-5">
                                    @if ($steps->media && in_array(pathinfo($steps->media, PATHINFO_EXTENSION), ['mp4', 'webm', 'ogg']))
                                        <video width="100%" controls>
                                            <source src="{{ asset('storage/images/' . $steps->media) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @elseif ($steps->media && in_array(pathinfo($steps->media, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'avif']))
                                        <img src="{{ asset('storage/images/' . $steps->media) }}" class="step-image m-2"
                                            alt="" width="100%">
                                    @endif
                                </div>
                                <div class="col-6">
                                    <p class="training-label-text">Step name</p>
                                    <h3 class="steps-text">{{ "$steps->step_name" }}</h3>
                                    <p class="training-label-text">Description</p>
                                    <div class="step-description">
                                        {{ "$steps->description" }}
                                    </div>
                                </div>

                            </div>

                        </section>
                    @endforeach

                    <!-- SECTION 2 -->

                    <!-- SECTION 3 -->

                </form>
                {{-- </div> --}}
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/wizard/js/jquery-3.3.1.min.js') }}"></script>

    <!-- JQUERY STEP -->
    <script src="{{ asset('assets/wizard/js/jquery.steps.js') }}"></script>

    <!-- DATE-PICKER -->
    <script src="{{ asset('assets/wizard/vendor/date-picker/js/datepicker.js') }}"></script>
    <script src="{{ asset('assets/wizard/vendor/date-picker/js/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/wizard/js/main.js') }}"></script>
@endsection
