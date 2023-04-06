@extends('admin.layouts.app')

@section('main-section')
    <div class="container">
        <form action="{{ route('peoples.update', $data->id) }}" method="POST" id="edit_form" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="emp_id" id="emp_id" value="{{ $data->id }}">
            <input type="hidden" name="emp_avatar" id="emp_avatar" value="{{ $data->Avatar }}">

            <div class="row">
                <div class="col-lg-10 col-7 mt-3">
                    <a href="{{ route('peoples.index') }}"><i class="bi bi-arrow-left"></i>
                        Back
                        To Peoples</a>
                </div>
                <div class=" col-lg-2 col-5">
                    <button type="submit" id="edit_employee_btn2" class="btn btn-dark   add-btn"
                        style="margin-left: -15px"><i class="bi bi-plus-circle"></i>
                        Save
                        Changes</button>
                </div>

                <div class="col-lg-12">
                    <div class="card shadow mt-3">
                        <div class="row">
                            <div class="col-lg-8 col-6 m-4">
                                <h5 class="card-title">EDIT PEOPLE</h5>
                            </div>
                            <div class="col-lg-3 col-3 mt-2">
                                <div class="mt-2" id="avatar">
                                    <img src="{{ asset('storage/images/' . $data->Avatar) }}" class="rounded-circle"
                                        alt="" width="100px" height="100px">
                                </div>
                            </div>
                        </div>
                        <div class="card-body mt-1" id="">
                            <div class="modal-body p-2   mb-5 ">
                                <div class="row">
                                    <div class="col-lg-4 col-12 mt-1">
                                        <div class="drop-zone">
                                            <span class="drop-zone__prompt">Drop file here or click to upload</span>
                                            <input type="file" name="avatar" class="drop-zone__input">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mt-4">
                                        <label for="fname">First Name</label>
                                        <input type="text" name="first_name" id="fname" class="form-control"
                                            placeholder="First Name" value="{{ $data->name }}" required>
                                    </div>
                                    <div class="col-lg-4 mt-4">
                                        <label for="lname">Last Name</label>
                                        <input type="text" name="last_name" id="lname" class="form-control"
                                            placeholder="Last Name" required value="{{ $data->lastname }}">
                                    </div>
                                    <div class="my-1 col-lg-4 mt-4">
                                        <label for="email">E-mail</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="E-mail" value="{{ $data->email }}" required>
                                    </div>
                                    <div class="my-1 col-lg-4 mt-4">
                                        <label for="phone">Phone</label>
                                        <input type="tel" name="phone" id="phone" class="form-control"
                                            placeholder="Phone" value="{{ $data->phone }}" required>
                                    </div>
                                    <div class="my-1 col-lg-4 mt-4">
                                        <label for="post">Address</label>
                                        <input type="text" name="post" id="post" class="form-control"
                                            placeholder="Post" value="{{ $data->post }}" required>
                                    </div>
                                    <div class=" col-lg-4 mt-5 my-2">
                                        <label for="driving_license">Driving License</label>
                                        <input type="text" name="drivinglicense" class="form-control"
                                            placeholder="drivinglicense">
                                    </div>
                                    {{-- <div class=" col-lg-4 mt-5 my-2">
                                        <label for="Alergies">Alergies</label>
                                        <input type="text" name="alergies" class="form-control" placeholder="Alergies">
                                    </div> --}}
                                    <div class=" col-lg-4 mt-5 my-2">
                                        <label for="blood_type">Blood Type</label>
                                        <input type="text" name="bloodtype" class="form-control"
                                            placeholder="Blood Type">
                                    </div>
                                </div>
                            </div>
                        </div>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
