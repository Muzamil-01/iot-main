<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
        return view("admin.people.create");
    }

    public function store(Request $request)
    {
        $file = $request->file('avatar');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/images', $fileName);
        $empData = ['name' => $request->fname, 'lastname' => $request->lname, 'email' => $request->email, 'phone' => $request->phone, 'post' => $request->post, 'Avatar' => $fileName];
        User::create($empData);
        return response()->json([
            'status' => 200,
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

        $data = ['name' => $request->fname, 'lastname' => $request->lname, 'email' => $request->email, 'phone' => $request->phone, 'post' => $request->post, 'Avatar' => $fileName];

        $model->update($data);

        return response()->json(['status' => 200]);
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
