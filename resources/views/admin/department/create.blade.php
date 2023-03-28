@extends('admin.layouts.app')

@section('main-section')
    <div class="container">
        <form action="{{ route('departments.store') }}" method="POST" id="add_form" enctype="multipart/form-data">
            <div class="row">

                <div class="col-lg-9 col-7">
                    <a href="{{ route('departments.index') }}"><i class="bi bi-arrow-left"></i> Back To Departments</a>
                </div>
                <div class=" col-lg-3 col-5">
                    <button type="submit" id="add_btn" class="btn btn-dark   add-btn">Save Data</button>

                </div>
                <div class="card shadow mt-3">
                    @csrf
                    <div class="modal-body p-3 mt-3  mb-5 ">
                        <div class="row">

                            <div class="col-lg-4 mt-4">
                                <label for="dep_name">Department Name</label>
                                <input type="text" name="dep_name" class="form-control" placeholder="Department Name"
                                    required>
                            </div>
                            <div class=" col-lg-4 mt-5 my-2">
                                <label for="description">Department Description</label>
                                <textarea type="text" name="description" class="form-control" placeholder="Department Description" required>
                                </textarea>
                            </div>
                        </div>
                    </div>
        </form>
    </div>
    </div>
    </div>
@endsection
