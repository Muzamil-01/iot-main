@extends('admin.layouts.app')
@section('main-section')
    <div class="container">
        <div class="row ">
            <div class="col-lg-12">
                <form action="{{ route('trainings.store') }}" method="POST" id="add_form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-9 col-7">
                            <a href="{{ route('trainings.index') }}"><i class="bi bi-arrow-left"></i> Back To Trainings</a>
                        </div>

                    </div>
                    @csrf
                    <div class="card shadow">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-12">
                                    <h1 class="card-title">Training: {{ $data->name }} </h1>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card shadow mt-3 p-3 appended-message">
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($child_data as $steps)
                            <div class="row mt-4">
                                <div class="col-3 " style="border-right:1px solid rgb(193, 193, 193) ">
                                    <p class="training-label-text ">Training step {{ $i++ }}</p>
                                    <img src="{{ asset('storage/images/' . $steps->media) }}" class="step-image m-2"
                                        alt="" width="100px">

                                </div>
                                <div class="col-9" id="step">
                                    <p class="training-label-text">Step name</p>
                                    <h3 class="steps-text">{{ $steps->step_name }}</h3>
                                    <p class="training-label-text">Step Numbers</p>
                                    <h3 class="steps-text">{{ $steps->step_num }}</h3>
                                    <p class="training-label-text">Description</p>
                                    <div class="step-description">
                                        {{ $steps->description }}
                                    </div>

                                    {{-- <textarea id="" cols="30" rows="2" class="form-control" name="description[]" readonly>{{ $steps->description }}</textarea> --}}
                                    {{-- <div class="row">
                                        <div class="col-3 offset-8">
                                            <button type="button" id="addmorestep"
                                                class="styled-btn btn btn-primary btn-sm mt-2"> <i
                                                    class="bi bi-plus-circle"></i> Add

                                                More</button>
                                        </div>
                                    </div> --}}
                </form>
            </div>
        </div>
        @endforeach

    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
