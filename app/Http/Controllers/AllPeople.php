<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AllPeople extends Controller
{
    public function index()
    {
        return view("admin.AllPeople.index");
    }
    public function fetchAll()
    {
        $emps = User::all();
        $output = '';
        if ($emps->count() > 0) {
            $output .= '<table class="table table-striped table-sm text-center align-middle">
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
            foreach ($emps as $emp) {
                $output .= '<tr>
                <td>' . $emp->id . '</td>
                <td><img src="storage/images/' . $emp->avatar . '" width="50" class="img-thumbnail rounded-circle"></td>
                <td>' . $emp->first_name . ' ' . $emp->last_name . '</td>
                <td>' . $emp->email . '</td>
                <td>' . $emp->post . '</td>
                <td>' . $emp->phone . '</td>
                <td>
                  <a href="' . route('edit_employee', ['id' => $emp->id]) . '" id="' . $emp->id . '" class="text-success mx-1 editIcon" ><i class="bi-pencil-square h4"></i></a>

                  <a href="javascript:void(0)" id="' . $emp->id . '" data-url="' . route('delete') . '" class="text-danger mx-1 delete_btn"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }
    }
    public function store(Request $request)
    {

        $file = $request->file('avatar');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/images', $fileName);

        $empData = ['first_name' => $request->fname, 'last_name' => $request->lname, 'email' => $request->email, 'phone' => $request->phone, 'post' => $request->post, 'avatar' => $fileName];
        User::create($empData);
        return response()->json([
            'status' => 200,
        ]);
    }
    public function add()
    {
        return view("admin.AllPeople.create");
    }
    public function edit($id)
    {
        $emp = User::find($id);
        // dd($emp);
        return view('admin.AllPeople.edit', compact('emp'));
    }
    public function update(Request $request)
    {
        $fileName = '';
        $emp = User::find($request->emp_id);
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $fileName);
            if ($emp->avatar) {
                Storage::delete('public/images/' . $emp->avatar);
            }
        } else {
            $fileName = $request->emp_avatar;
        }

        $empData = ['first_name' => $request->fname, 'last_name' => $request->lname, 'email' => $request->email, 'phone' => $request->phone, 'post' => $request->post, 'avatar' => $fileName];

        $emp->update($empData);
        return response()->json([
            'status' => 200,
        ]);
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $emp = User::find($id);
        // if (Storage::delete('public/images/' . $emp->avatar)) {
        User::destroy($id);
        // }
    }
}
