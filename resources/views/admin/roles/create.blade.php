@extends('admin.layouts.app')

@section('main-section')

<div class="bg-light p-4 rounded">

    <div class="lead">
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
            <div class="card shadow-2-strong tab-1">
                <div class="card-body">
                    <form method="POST" id="add_form" action="{{ route('roles.store') }}">
                        @csrf

                        <input type="hidden" name="_method" value="get">

                        <div class="row mt-5">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="form-label">Role</label>
                                    <input value="{{ old('name') }}" type="text" class="form-control" name="name" placeholder="Name" required>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="name" class="form-label">Permissions</label>
                                    <select name="permission[]" class="select2 form-control" id="permissions" multiple>
                                        @foreach($permissions as $permission)
                                        <option value="{{$permission->name}}">{{$permission->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <br>
                            <button type="submit" class="btn btn-primary float-right mb-4">Save</button>
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