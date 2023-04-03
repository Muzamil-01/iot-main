@extends('admin.layouts.app')
@section('main-section')
    <div class="container">
        <div class="row ">
            <div class="col-lg-9 col-7">
                <a href="{{ route('departments.index') }}"><i class="bi bi-arrow-left"></i> Back To Departments</a>
            </div>

            <div class="col-lg-12 mt-2">
                <div class="card shadow">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h3 class="card-title text-dark">Department :- {{ $data->dep_name }}</h3>
                        <div class="row">


                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <div class=" table-responsive pt-3 p-2" id="show_all_employees">
                                <h1 class="text-center text-secondary my-5">Loading...</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
