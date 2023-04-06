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
                    <div class="card shadow mt-1">
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
                                    <p class="training-label-text">Training step {{ $i++ }}</p>
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
                                <div class="col-9" id="step">
                                    <p class="training-label-text">Step name</p>
                                    <h3 class="steps-text">{{ $steps->step_name }}</h3>
                                    <p class="training-label-text">Step Numbers</p>
                                    <h3 class="steps-text">{{ $steps->step_num }}</h3>
                                    <p class="training-label-text">Description</p>
                                    <div class="step-description">
                                        {{ $steps->description }}
                                    </div>
                                    <div class="row">
                                        <div class="offset-9 col-2">

                                            <div class="dropdown">
                                                <button class="btn btn-dark btn-sm dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                                                    <li><a href="{{ route('steps.edit', ['id' => $steps->id]) }}"
                                                            id="{{ $steps->id }}"
                                                            class="dropdown-item text-dark mx-1 h4 editIcon"><i
                                                                class="bi-pencil-square h4"></i>Edit</a></li>
                                                    <li><a href="javascript:void(0)" id="{{ $steps->id }}"
                                                            data-url="{{ route('steps.delete', $steps->id) }}"
                                                            class="dropdown-item h4 text-dark mx-1 delete_btn"><i
                                                                class="bi-trash h4"></i>Delete</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
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
