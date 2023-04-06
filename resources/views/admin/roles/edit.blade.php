@extends('admin.layouts.app')

@section('main-section')




<div class="bg-light p-4 rounded">
    <h1 class="card-title">Update role</h1>
    <div class="card-title">
        Edit role and manage permissions.
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

        <div class="card shadow-2-strong tab-1">
            <div class="card-body">
                <form method="POST" id="edit_form" action="{{ route('roles.update', $role->id) }}">
                    @method('head')
                    @csrf

                    <input type="hidden" name="_method" value="get">

                    <div class="row mt-5">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name" class="form-label">Role</label>
                                <input value="{{ $role->name }}" type="text" class="form-control" name="Role"
                                    placeholder="Name" required>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name" class="form-label">Permissions</label>
                                <select name="permission[]" class="select2 form-control" id="permissions" multiple>
                                    @foreach($permissions as $permission)
                                    <option value="{{ $permission->id }}"
                                        {{ in_array($permission->name, $rolePermissions) ? 'selected' : '' }}>
                                        {{ $permission->name }}
                                    </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>
<br>
                    <div class="row">

            <div class="col-lg-9 col-7">
            <a href="{{ route('roles') }}" class="btn btn-default mt-4">Back</a>

            </div>

            <div class=" col-lg-3 col-5">

            <button type="submit" style="margin-left: 30px;" class="btn btn-primary btn-sm float-right add-btn mt-4">Save</button>

            </div>

                </div>
                </form>
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