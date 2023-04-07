@extends('admin.layouts.app')

@section('main-section')

    <div class="bg-light p-4 rounded">

        <div class="card-title p-3">
            Add New Role and Assign Permissions.
        </div>

        <div class="container mt-4">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif



            <div class="col-12 mb-4">
                <form method="POST" id="add_form" action="{{ route('roles.store') }}">
                    <div class="row m-2">
                        <div class="col-lg-10 col-7 mt-3">
                            <a href="{{ route('roles') }}"><i class="bi bi-arrow-left"></i> Back To
                                roles</a>
                        </div>
                        <div class=" col-lg-2 col-5">
                            <button type="submit" id="add_btn" class="btn btn-dark   add-btn">
                                <i class="bi bi-plus-circle"></i>
                                Save Data</button>
                        </div>
                    </div>
                    <div class="card shadow-2-strong tab-1 mt-3">
                        <div class="card-body">
                            @csrf

                            <input type="hidden" name="_method" value="get">

                            <div class="row mt-5">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Role</label>
                                        <input value="{{ old('name') }}" type="text" class="form-control"
                                            name="name" placeholder="Name" required>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Permissions</label>
                                        <select name="permission[]" class="select2 form-control" id="permissions" multiple>
                                            @foreach ($permissions as $permission)
                                                <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                            @endforeach
                                        </select>

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

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('[name="all_permission"]').on('click', function() {

                if ($(this).is(':checked')) {
                    $.each($('.permission'), function() {
                        $(this).prop('checked', true);
                    });
                } else {
                    $.each($('.permission'), function() {
                        $(this).prop('checked', false);
                    });
                }

            });
        });
    </script>
@endsection
