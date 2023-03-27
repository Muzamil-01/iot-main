@extends('admin.layouts.app')

@section('main-section')
    <div class="container">
        <form action="{{ route('peoples.store') }}" method="POST" id="add_form" enctype="multipart/form-data">
            <div class="row">

                <div class="col-lg-9 col-7">
                    <a href="{{ route('peoples.index') }}"><i class="bi bi-arrow-left"></i> Back To People</a>
                </div>
                <div class=" col-lg-3 col-5">
                    <button type="submit" id="add_btn" class="btn btn-dark   add-btn">ADD PEOPLE</button>

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
                                <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                            </div>
                            <div class="col-lg-4 mt-4">
                                <label for="lname">Last Name</label>
                                <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                            </div>
                            <div class=" col-lg-4 mt-5 my-2">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                            </div>
                            <div class=" col-lg-4 mt-5 my-2">
                                <label for="phone">Contact</label>
                                <input type="tel" name="phone" class="form-control" placeholder="Phone" required>
                            </div>
                            <div class=" col-lg-4 mt-5 my-2">
                                <label for="Address">Address</label>
                                <input type="text" name="post" class="form-control" placeholder="Address" required>
                            </div>
                            <div class=" col-lg-4 mt-5 my-2">
                                <label for="drivinglicense">Driving License</label>
                                <input type="text" name="drivinglicense" class="form-control"
                                    placeholder="drivinglicense">
                            </div>
                            <div class=" col-lg-4 mt-5 my-2">
                                <label for="Alergies">Alergies</label>
                                <input type="text" name="alergies" class="form-control" placeholder="Alergies">
                            </div>
                            <div class=" col-lg-4 mt-5 my-2">
                                <label for="bloodtype">Blood Type</label>
                                <input type="text" name="bloodtype" class="form-control" placeholder="Blood Type">
                            </div>

                        </div>
                    </div>
        </form>
    </div>
    </div>
    </div>
@endsection
