@extends('admin.layouts.app')

@section('main-section')
    {{-- <div class="bg-light p-4 rounded"> --}}


    {{-- <div class="row">
        <div class="offset-0 col-8">

            <h3> Manage Roles </h3>

        </div>
        <div class="offset-9 col-2">

            <a href="{{route('roles_create')}}" class="btn btn-primary float-right add-btn mb-4"> <i
                    class="bi-plus-circle"> </i> Add Role </a>
        </div>
    </div> --}}


    <section class="intro">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center"
                        style="padding-left:0px;padding-right:0px">
                        <h3 class="card-title text-dark ">Manage roles</h3>
                        <div class="row ">
                            <div class="col-12">
                                <a href="{{ route('roles_create') }}" class="btn btn-primary float-right add-btn"><i
                                        class="bi-plus-circle"></i> Add Roles</a>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-2-strong tab-1">
                        <div class="card-body  h-card mt-4">
                            <div class="table-responsive table-sm compact nowrap">
                                <table class="tableview table " style="width:100%">
                                    <thead>

                                        <tr>
                                            <th width="1%">No</th>
                                            <th>Role</th>
                                            <th width="3%" colspan="3">Actions</th>
                                        </tr>
                                        @foreach ($roles as $key => $role)
                                            <tr>
                                                <td>{{ $role->id }}</td>
                                                <td>{{ $role->name }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-dark btn-sm dropdown-toggle" type="button"
                                                            id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            Actions
                                                        </button>
                                                        <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                                                            <li><a href="{{ route('roles.edit', $role->id) }}"
                                                                    class="dropdown-item text-dark mx-1 h4"><i
                                                                        class="bi-pencil-square h4 "></i>
                                                                    Edit</a></li>



                                                            <li> <a href="{{ route('roles.show', $role->id) }}"
                                                                    class="dropdown-item text-dark mx-1 h4 editIcon"><i
                                                                        class="bi-eye h4"></i>Show</a>
                                                            </li>

                                                            <li>





                                                                <form method="POST"
                                                                    action="{{ route('roles.destroy', $role->id) }}"
                                                                    id="add_form">
                                                                    @csrf

                                                                    <input type="hidden" name="id"
                                                                        value="{{ $role->id }}">
                                                                    <button type="submit"
                                                                        data-form-id="#delete_form_{{ $role->id }}"
                                                                        class="dropdown-item h4 text-dark mx-1 delete_btn"><i
                                                                            class="bi-trash h4"></i>Delete
                                                                    </button>
                                                                </form>







                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>







                                            </tr>
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <div class="d-flex">
                                    {!! $roles->links() !!}
                                </div> -->

    </div>
    </main>
@endsection
