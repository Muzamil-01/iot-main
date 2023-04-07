<?php

namespace App\Http\Controllers;

use App\Models\Issues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IssueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view("admin.issues.index", ['fetch_route' => route('issues.fetch')]);
    }

    public function fetch()
    {
        $data = Issues::all();
        $output = '';
        if ($data->count() > 0) {
            $output .= '<table class="table table-striped table-sm text-center align-middle" id="#tabledata">
              <thead>
                <tr >
                  <th>ID</th>
                  <th>Status</th>
                  <th>name</th>
                  <th>Issue Description</th>
                  <th>DATE</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>';

            foreach ($data as $row) {
                $output .= '<tr>
                  <td>
                  ' . $row->id . '</td>
                  <td><div class="circle" style=" width: 10px; height: 10px; border-radius: 50%; background-color: red;
                  "></div>' . $row->status . '
                  
                  
                  </td>
                  <td>' . $row->name . '</td>
                  <td>' . $row->description . '</td>
                  <td>' . $row->created_at . '</td>
                  <td>
                    <div class="dropdown">
                    <button class="btn btn-dark btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                      Actions 
                    </button>
                    <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton" >
                      <li><a href="' . route('issues.edit', ['id' => $row->id]) . '" id="' . $row->id . '" class="dropdown-item text-dark mx-1 h4 editIcon" ><i class="bi-pencil-square h4"></i>Edit</a></li>
                      <li><a href="javascript:void(0)" id="' . $row->id . '" data-url="' . route('issues.delete', $row->id) . '" class="dropdown-item h4 text-dark mx-1 delete_btn"><i class="bi-trash h4"></i>Delete</a></li>
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
        return view("admin.issues.create");
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 403,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ]);
        }

        $empData = ['name' => $request->name, 'description' => $request->description];
        Issues::create($empData);
        return response()->json([
            'status' => 200,
            'message' => 'Issue has been added',
        ]);
    }

    public function edit($id)
    {
        $data = Issues::find($id);
        return view('admin.issues.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $model = Issues::find($id);
        $data = ['name' => $request->name, 'description' => $request->description];

        $model->update($data);

        return response()->json([
            'status' => 200,
            'message' => 'Issue has been updated',

        ]);
    }

    public function delete($id)
    {
        Issues::destroy($id);
    }
}
