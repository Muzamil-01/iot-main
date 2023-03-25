@extends('admin.layouts.app')
@section('main-section')
    <div class="container">
        <div class="row ">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h3 class="card-title text-dark">Manage People</h3>
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ route('peoples.create') }}" class="btn btn-primary float-right add-btn"><i
                                        class="bi-plus-circle"></i> Add New People</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class=" table-responsive pt-3 p-2" id="show_all_employees">
                            <h1 class="text-center text-secondary my-5">Loading...</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
