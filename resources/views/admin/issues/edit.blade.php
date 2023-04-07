@extends('admin.layouts.app')

@section('main-section')
    <div class="container">
        <form action="{{ route('issues.update', $data->id) }}" method="POST" id="edit_form" enctype="multipart/form-data">
            <div class="row m-2">
                <input type="hidden" name="issue" id="issue" value="{{ $data->id }}">

                <div class="col-lg-10 col-7 mt-3">
                    <a href="{{ route('issues.index') }}" style="margin-left: -20px"><i class="bi bi-arrow-left"></i>
                        Back
                        To issues</a>
                </div>
                <div class=" col-lg-2 col-5">
                    <button type="submit" id="edit_employee_btn2" class="btn btn-dark   add-btn"><i
                            class="bi bi-plus-circle"></i>
                        Save
                        Changes</button>
                </div>
            </div>
            <div class="card shadow mt-3">
                @csrf
                <div class="container p-3 mt-3  mb-5  col-lg-9">
                    <h2 class="card-title">Edit Issue</h2>
                    <div class="row ">
                        <div class="col-lg-12 mt-3 ">
                            <label for="name" class="training-label-text">Issue Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $data->name }}">
                        </div>
                        <div class=" col-lg-12 mt-3">
                            <label for="description" class="training-label-text">Issue Description</label>
                            <textarea type="text" name="description" class="form-control" placeholder="Department Description">
                                {{ $data->description }}
                                </textarea>
                        </div>
                    </div>
                </div>
        </form>
    </div>
    </div>
    </div>
@endsection
