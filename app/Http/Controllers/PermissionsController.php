<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Traits\HasPermissions;


class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function construct(){

        $this->middleware(['permission:can manage permissions']);

	}


    public function index()
    {   
        $permissions = Permission::all();
        
        return view('admin.permissions.index',compact('permissions'));
       

    }

    /**
     * Show form for creating permissions
     * 
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {   
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $request->validate([
            'name' => 'required|unique:users,name'
        ]);

        Permission::create($request->only('name'));

        return response()->json([
			'status' => 200,
            'success' => 'Permission Successfully Updated'
		]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Permission  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        // $permission = DB::table('permissions')->where('id', $id)->get();

        $permission=  Permission::findOrFail($id);

        return view('admin.permissions.edit',compact('permission'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       


        $permission = Permission::findOrFail($request->id);

       
        if(!$permission->id){

            return response()->json([ 'status' => 200,
            'false' => 'Permission Not Found' ]);
        }

        $permission->update($request->only('name'));

        $permission->save();

        return response()->json([
			'status' => 200,
            'success' => 'Permission Successfully Updated'
		]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $id)
    {

    
        $permission = Permission::findOrfail($id);

        $permission->delete();

        return response()->json([
			'status' => 200,
            'success' => 'Permission Successfully Deleted'
		]);
    }
}
