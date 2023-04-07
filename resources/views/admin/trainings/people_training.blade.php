@extends('admin.layouts.app')
@section('css')
    <style>
        .card {
            border: none;
            transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
            overflow: hidden;
            border-radius: 20px;
            min-height: 400px;
            box-shadow: 0 0 12px 0 rgba(0, 0, 0, 0.2);

            @media (max-width: 768px) {
                min-height: 350px;
            }

            @media (max-width: 420px) {
                min-height: 300px;
            }

            &.card-has-bg {
                transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
                background-size: 120%;
                background-repeat: no-repeat;
                background-position: center center;

                &:before {
                    content: '';
                    position: absolute;
                    top: 0;
                    right: 0;
                    bottom: 0;
                    left: 0;
                    background: inherit;
                    -webkit-filter: grayscale(1);
                    -moz-filter: grayscale(100%);
                    -ms-filter: grayscale(100%);
                    -o-filter: grayscale(100%);
                    filter: grayscale(100%);
                }

                &:hover {
                    transform: scale(0.98);
                    box-shadow: 0 0 5px -2px rgba(0, 0, 0, 0.3);
                    background-size: 130%;
                    transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);

                    .card-img-overlay {
                        transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
                        background: rgb(35, 79, 109);
                        background: linear-gradient(0deg, rgba(4, 69, 114, 0.5) 0%, rgba(4, 69, 114, 1) 100%);
                    }
                }
            }

            .card-footer {
                background: none;
                border-top: none;

                .media {
                    img {
                        border: solid 3px rgba(255, 255, 255, 0.3);
                    }
                }
            }

            .card-meta {
                color: #26BD75
            }

            .card-body {
                transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
            }

            &:hover {
                .card-body {
                    margin-top: 30px;
                    transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
                }

                /* cursor: pointer; */
                transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
            }

            .card-img-overlay {
                transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
                background: rgb(35, 79, 109);
                background: linear-gradient(0deg, rgba(35, 79, 109, 0.3785889355742297) 0%, rgba(69, 95, 113, 1) 100%);
            }
        }

        @media (max-width: 767px) {}
    </style>
@endsection
@section('main-section')
    {{-- <div class="container">
        <div class="row">
            <h2 class="card-title p-3 mb-3">
                ALL Trainings
            </h2>
            @foreach ($data as $trainings)
                <a href="{{ route('trainings.show', ['id' => $trainings->id]) }}">
                    <div class="col-xl-12 mt-2">
                        <div class="card mb-4 card-body shadow">
                            <div class="row align-items-center mt-3">
                                <div class="col-auto">
                                    <a href="{{ route('trainings.show', ['id' => $trainings->id]) }}">
                                        <img src="{{ asset('storage/images/trainings.avif') }}" class="width-90 rounded-3 "
                                            alt="">
                                    </a>
                                </div>
                                <div class="col">
                                    <div class="overflow-hidden flex-nowrap">
                                        <h6 class="mb-1">
                                            <a href="{{ route('trainings.show', ['id' => $trainings->id]) }}"
                                                class=" card-title">{{ $trainings->name }}</a>
                                        </h6>
                                        <span class="text-muted d-block mb-2 small">
                                            {{ $trainings->estimated_time . ' mins' }}
                                        </span>
                                        <div class="row align-items-center">
                                            <div class="col-12">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
    </div> --}}


    <section class="wrapper">
        <div class="container">

            <div class="row">
                {{ $i = 1 }}
                @foreach ($data as $trainings)
                    <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                        <a href="{{ route('trainings.show', ['id' => $trainings->id]) }}">
                            <div class="card text-white card-has-bg click-col"
                                style="background-image:url('{{ asset('storage/images/trainings.avif') }}');">
                                <img class="card-img d-none" src="{{ asset('storage/images/trainings.avif') }}"
                                    alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
                                <div class="card-img-overlay d-flex flex-column">
                                    <div class="card-body">
                                        <small class="card-meta mb-2">Training: ({{ $i++ }})</small>
                                        <h4 class="card-title mt-0 "><a class="text-white"
                                                href="{{ route('trainings.show', ['id' => $trainings->id]) }}">{{ $trainings->name }}</a>
                                        </h4>
                                        <small><i class="far fa-clock"></i>
                                            {{ $trainings->estimated_time . ' mins' }}</small>
                                    </div>
                                    <div class="card-footer">
                                        <div class="media">
                                            <img class="mr-3 rounded-circle"
                                                src="{{ asset('storage/images/people_training.png') }}"
                                                alt="Generic placeholder image" style="max-width:50px">
                                            <div class="media-body">
                                                <h6 class="my-0 text-white d-block">{{ $trainings->created_at }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach






            </div>

        </div>
    </section>
@endsection
