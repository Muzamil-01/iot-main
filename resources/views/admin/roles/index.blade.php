@extends('admin.layouts.app')

@section('main-section')

   
<div class="bg-light p-4 rounded">
        <h1>Roles</h1>
        <div class="lead">
            Manage your roles here.
            <a href="{{route('roles_create')}}" class="btn btn-primary btn-sm float-right">Add role</a>
        </div>
        
       

        <table class="table table-striped table-sm text-center align-middle">
          <tr>
             <th width="1%">No</th>
             <th>Name</th>
             <th width="3%" colspan="3">Action</th>
          </tr>
            @foreach ($roles as $key => $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                </td>
              
                </td>
            </tr>
            @endforeach
        </table>

        <div class="d-flex">
            {!! $roles->links() !!}
        </div>

    </div>
</main> 
@endsection
