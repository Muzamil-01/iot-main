<?php

namespace App\Http\Controllers;

use App\Models\TrainingSteps;
use App\Models\Training;
use App\Models\Department;

use Illuminate\Http\Request;

class TrainingController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    return view("admin.trainings.index", ['fetch_route' => route('trainings.fetch')]);
  }


  public function fetch()
  {
    $data = Training::all();
    $output = '';
    // dd($data);
    if ($data->count() > 0) {
      $output .= '<table class="table table-striped table-sm text-center align-middle" id="#tabledata">
            <thead>
              <tr >
                <th>ID</th>
                <th>Training</th>
                <th>Estimated-time</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
      foreach ($data as $row) {
        $output .= '<tr>
                <td>' . $row->id . '</td>
                <td>' . $row->name . '</td>
                <td>' . $row->estimated_time . '</td>
                <td>
                  <div class="dropdown">
                  <button class="btn btn-dark btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Actions 
                  </button>
                  <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton" >
                    <li><a href="' . route('trainings.edit', ['id' => $row->id]) . '" id="' . $row->id . '" class="dropdown-item text-dark mx-1 h4 editIcon" ><i class="bi-pencil-square h4"></i>Edit</a></li>
                    <li><a href="javascript:void(0)" id="' . $row->id . '" data-url="' . route('trainings.delete', $row->id) . '" class="dropdown-item h4 text-dark mx-1 delete_btn"><i class="bi-trash h4"></i>Delete</a></li>
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
    $data =  Department::all();
    return view('admin.trainings.create', compact('data'));
  }
  // public function show($id)
  // {
  //   $data = Training::findOrFail($id);
  //   $child_data = TrainingSteps::where('training_id', $id)->orderBy('step_num', 'asc')->get();
  //   return view('', compact('data', 'child_data'));
  // }


  public function store(Request $request)
  {
    // print_r($request->department);

    $file = $request->file('media');
    $fileName = time() . '.' . $file->getClientOriginalExtension();
    $file->storeAs('public/images', $fileName);
    $empData = ['name' => $request->name, 'estimated_time' => $request->estimated_time, 'department_id' => $request->department];
    $empData2 = ['step_num' => $request->step_num, 'step_name' => $request->step_name, 'media' => $fileName, 'description' =>  $request->description];
    $training =  Training::create($empData);
    $empData2['training_id'] = $training->id;
    TrainingSteps::create($empData2);
    return response()->json([
      'status' => 200,
    ]);
  }
}
