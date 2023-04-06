@extends('admin.layouts.app')

@section('main-section')
    <div class="container">
        <form action="{{ route('departments.store') }}" method="POST" id="add_form" enctype="multipart/form-data">
            <div class="row m-2">
                <div class="col-lg-10 col-7 mt-3">
                    <a href="{{ route('departments.index') }}" style="margin-left: -20px"><i class="bi bi-arrow-left"></i> Back
                        To Departments</a>
                </div>
                <div class=" col-lg-2 col-5">
                    <button type="submit" id="add_btn" class="btn btn-dark   add-btn"><i class="bi bi-plus-circle"></i>
                        Save
                        Data</button>
                </div>
            </div>
            <div class="card shadow mt-3">
                @csrf
                <div class="container p-3 mt-3  mb-5  col-lg-9">
                    <h2 class="card-title">Add New Department</h2>
                    <div class="row ">
                        <div class="col-lg-12 mt-3 ">
                            <label for="department_name" class="training-label-text">Department Name</label>
                            <input type="text" name="department_name" class="form-control">
                        </div>
                        <div class=" col-lg-12 mt-3">
                            <label for="description" class="training-label-text">Department Description</label>
                            <textarea type="text" name="description" class="form-control" placeholder="Department Description">
                                </textarea>
                        </div>
                    </div>
                </div>
        </form>
    </div>
    </div>
    </div>
@endsection
