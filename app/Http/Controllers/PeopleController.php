<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PeopleController extends Controller
{
    public function index()
    {
        return view("admin.people.index", ['fetch_route' => route('peoples.fetch')]);
    }

    public function fetch()
    {
        $data = User::all();
        $output = '';
        if ($data->count() > 0) {
            $output .= '<table class="table table-striped table-sm text-center align-middle" id="#tabledata">
            <thead>
              <tr >
                <th>ID</th>
                <th>Avatar</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Post</th>
                <th>Phone</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';

            foreach ($data as $row) {
                $output .= '<tr>
                <td>' . $row->id . '</td>
                <td><img src="storage/images/' . $row->Avatar . '" width="50px" height="50px" class="rounded-circle "></td>
                <td>' . $row->name . ' ' . $row->lastname . '</td>
                <td>' . $row->email . '</td>
                <td>' . $row->post . '</td>
                <td>' . $row->phone . '</td>
                <td>
                  <div class="dropdown">
                  <button class="btn btn-dark btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Actions 
                  </button>
                  <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton" >
                    <li><a href="' . route('peoples.show', ['id' => $row->id]) . '"  class="dropdown-item text-dark mx-1 h4" ><i class="bi-eye h4" ></i>View</a></li>
                    <li><a href="' . route('peoples.edit', ['id' => $row->id]) . '" id="' . $row->id . '" class="dropdown-item text-dark mx-1 h4 editIcon" ><i class="bi-pencil-square h4"></i>Edit</a></li>
                    <li><a href="javascript:void(0)" id="' . $row->id . '" data-url="' . route('peoples.delete', $row->id) . '" class="dropdown-item h4 text-dark mx-1 delete_btn"><i class="bi-trash h4"></i>Delete</a></li>
                  </ul>
                </div>
                  </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }
    }

    public function create()
    {
        $data = Department::all();
        return view("admin.people.create", compact('data'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|min:11|max:20|unique:users,phone',
            'post' => 'required|string|max:255',
            // 'avatar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'driving_license' => 'required|string|max:255',
            'blood_type' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 403,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ]);
        }
        $file = $request->file('avatar');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/images', $fileName);
        $empData = ['name' => $request->first_name, 'lastname' => $request->last_name, 'email' => $request->email, 'phone' => $request->phone, 'post' => $request->post, 'Avatar' => $fileName, 'driving_license' => $request->driving_license, 'blood_type' => $request->blood_type, 'department_id' => $request->department_id];
        User::create($empData);
        return response()->json([
            'status' => 200,
            'message' => 'People has been added',
        ]);
    }

    public function show($id)
    {
        $data = User::find($id);
        return view('admin.people.show', compact('data'));
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.people.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $fileName = '';
        $model = User::find($id);
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $fileName);
            if ($model->Avatar) {
                Storage::delete('public/images/' . $model->Avatar);
            }
        } else {
            $fileName = $request->emp_avatar;
        }

        $data = ['name' => $request->first_name, 'lastname' => $request->last_name, 'email' => $request->email, 'phone' => $request->phone, 'post' => $request->post, 'Avatar' => $fileName, 'driving_license' => $request->driving_license, 'blood_type' => $request->blood_type, 'department_id' => $request->department_id];
        // $data = ['name' => $request->fname, 'lastname' => $request->lname, 'email' => $request->email, 'phone' => $request->phone, 'post' => $request->post, 'Avatar' => $fileName];

        $model->update($data);

        return response()->json([
            'status' => 200,
            'message' => 'People has been updated',

        ]);
    }
    public function delete(Request $request, $id)
    {
        $model = User::find($id);
        // @unlink('storage/images/' . $model->Avatar);
        // User::destroy($id);
        if (Storage::delete('public/images/' . $model->Avatar)) {
            User::destroy($id);
        }
    }
}
