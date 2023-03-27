
@extends('admin.layouts.app')
@section('main-section')

    
<div class="container">
        <div class="row ">
            <div class="col-lg-12">
    <div class="bg-light p-4 rounded">
        <h2>Permissions</h2>
        <div class="lead">
            Manage your permissions here.
            <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-sm float-right" style="margin-left:00px;">Add permissions</a>
        </div>
        
       

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" width="15%">Name</th>
                <th scope="col">Guard</th> 
                <th scope="col" colspan="3" width="1%"></th> 
            </tr>
            </thead>
            <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->guard_name }}</td>
                        <td><a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                        <td>
 
                         

                            <form action="{{ url('permissions.destroy' , $permission->id ) }}" id="" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger btn-sm" type="submit" >Delete</button>
                            </form>

                            

                        
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
            </div>
        </div>
</div>
@endsection
