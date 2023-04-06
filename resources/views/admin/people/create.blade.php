@extends('admin.layouts.app')

@section('main-section')
    <div class="container">
        <form action="{{ route('peoples.store') }}" method="POST" id="add_form" enctype="multipart/form-data">
            {{-- <div class="row">

                <div class="col-lg-9 col-7">
                    <a href="{{ route('peoples.index') }}"><i class="bi bi-arrow-left"></i> Back To People</a>
                </div>
                <div class=" col-lg-3 col-5">
                    <button type="submit" id="add_btn" class="btn btn-dark   add-btn">ADD PEOPLE</button>

                </div> --}}
            <div class="row m-2">
                <div class="col-lg-10 col-7 mt-3">
                    <a href="{{ route('peoples.index') }}" style="margin-left: -20px"><i class="bi bi-arrow-left"></i> Back To
                        People</a>
                </div>
                <div class=" col-lg-2 col-5">
                    <button type="submit" id="add_btn" class="btn btn-dark   add-btn"><i class="bi bi-plus-circle"></i>
                        Save
                        Data</button>
                </div>
            </div>

            <div class="card shadow mt-3">
                @csrf
                <div class="modal-body p-3 mt-3  mb-5 ">
                    <div class="row">
                        <div class="col-lg-4 col-12 mt-1">

                            <div class="drop-zone">
                                <span class="drop-zone__prompt">Drop file here or click to upload</span>
                                <input type="file" name="avatar" class="drop-zone__input">
                            </div>
                        </div>
                        <div class="col-lg-4 mt-4">
                            <label for="fname">First Name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="First Name">
                        </div>
                        <div class="col-lg-4 mt-4">
                            <label for="lname">Last Name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                        </div>
                        <div class=" col-lg-4 mt-5 my-2">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" class="form-control" placeholder="E-mail">
                        </div>
                        <div class=" col-lg-4 mt-5 my-2">
                            <label for="phone">Contact</label>
                            <input type="tel" name="phone" class="form-control" placeholder="Phone">
                        </div>
                        <div class=" col-lg-4 mt-5 my-2">
                            <label for="Address">Address</label>
                            <input type="text" name="post" class="form-control" placeholder="Address">
                        </div>
                        <div class=" col-lg-4 mt-5 my-2">
                            <label for="drivinglicense">Driving License</label>
                            <input type="text" name="driving_license" class="form-control" placeholder="drivinglicense">
                        </div>
                        <div class=" col-lg-4 mt-5 my-2">
                            <label for="Alergies">Department</label>
                            <select name="department_id" class="form-select">
                                @foreach ($data as $child_data)
                                    <option value="{{ $child_data->id }}">{{ $child_data->dep_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4 mt-5 my-2">
                            <label for="blood_type">Blood Type</label>
                            <input type="text" name="blood_type" class="form-control" placeholder="Blood Type">
                        </div>

                    </div>
                </div>
        </form>
    </div>
    </div>
    </div>
@endsection
