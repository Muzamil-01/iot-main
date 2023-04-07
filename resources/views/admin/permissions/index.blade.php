@extends('admin.layouts.app')
@section('main-section')
    <div class="container">
        <div class="row ">
            <div class="col-lg-12">
                <div class="card-header bg-light d-flex justify-content-between align-items-center"
                    style="padding-left:0px;padding-right:0px">
                    <h3 class="card-title text-dark p-3">Manage Permissions</h3>
                    <div class="row p-2">
                        <div class="col-12">
                            <a href="{{ route('permissions.create') }}" class="btn btn-primary float-right add-btn"><i
                                    class="bi-plus-circle"></i> Add Permissions</a>
                        </div>
                    </div>
                </div>




                <section class="intro">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="card shadow-2-strong tab-1">
                                    <div class="card-body  h-card">
                                        <div class="table-responsive table-sm compact  nowrap">
                                            <table class="tableview table mt-4" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Permissions</th>
                                                        <th>Guard</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($permissions as $permission)
                                                        <tr>
                                                            <td>{{ $permission->name }}</td>
                                                            <td>{{ $permission->guard_name }}</td>
                                                            <td>

                                                                <div class="dropdown">
                                                                    <button class="btn btn-dark btn-sm dropdown-toggle"
                                                                        type="button" id="dropdownMenuButton"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        Actions
                                                                    </button>
                                                                    <ul class="dropdown-menu "
                                                                        aria-labelledby="dropdownMenuButton">
                                                                        <li><a href="{{ route('permissions.edit', $permission->id) }}"
                                                                                class="dropdown-item text-dark mx-1 h4 editIcon"><i
                                                                                    class="bi-pencil-square h4"></i>Edit</a>
                                                                        </li>

                                                                        <li> <a href=""
                                                                                class="dropdown-item h4 text-dark mx-1 delete_btn"
                                                                                data-form-id="#delete_form_{{ $permission->id }}">
                                                                                <i class="bi-trash h4"></i>Delete</a>

                                                                            <form
                                                                                action="{{ route('permissions.destroy', $permission->id) }}"
                                                                                method="post"
                                                                                id="delete_form_{{ $permission->id }}">

                                                                                @csrf
                                                                                {{ method_field('GET') }}



                                                                            </form>
                                                                        </li>
                                                                    </ul>
                                                                </div>














                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    </div>
@endsection
