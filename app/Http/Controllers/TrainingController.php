<?php

namespace App\Http\Controllers;

use App\Http\Helpers\UserTraining;
use App\Models\TrainingSteps;
use App\Models\UserTrainings;
use App\Models\Training;
use Illuminate\Support\Facades\Storage;
use App\Models\Department;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TrainingController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $user = auth()->user();
    // $data = Training::where('department_id', $user->department_id)->get();
    $data = Training::all();
    $data2 = Department::where('id', $data->training_id);
    if (!$user->hasRole(['super-admin', 'admin', 'editor', 'moderator'])) {
      return view("admin.trainings.people_training", compact('data', 'data2'));
    } else {
      return view("admin.trainings.index", ['fetch_route' => route('trainings.fetch')]);
    }
  }



  public function fetch()
  {
    $data = Training::all();
    $output = '';
    // dd($data);
    if ($data->count() > 0) {
      $output .= '<table class="table table-striped table-sm text-center align-middle " id="#tabledata" >
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
                <td>' . $row->estimated_time . 'min</td>
                <td>
                  <div class="dropdown">
                  <button class="btn btn-dark btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Actions 
                  </button>
                  <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton" >
                  <li><a href="' . route('trainings.show', ['id' => $row->id]) . '"  class="dropdown-item text-dark mx-1 h4" ><i class="bi-eye h4" ></i>View</a></li>

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

    $selected_department_id = 0;
    if (request()->has('department') && request()->filled('department')) {
      $selected_department_id = request()->get('department');
    }
    $data =  Department::all();
    return view('admin.trainings.create', compact('data', 'selected_department_id'));
  }





  public function show(Request $request, $id)
  {
    $data = Training::findOrFail($id);
    $child_data = TrainingSteps::where('training_id', $id)->orderBy('step_num', 'asc')->get();

    $data = Training::find($id);

    $user_training = new UserTraining();

    $user_training->initialize($data);

    return view('admin.trainings.show', compact('data', 'child_data'), ['request' => $request]);
  }


  public function store(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'name' => 'required|max:255',
      'estimated_time' => 'required',
      'step_num.*' => 'required',
      'step_name.*' => 'required',
      'media.*' => 'required',
      'description.*' => 'required',
    ]);



    if ($validator->fails()) {

      return response()->json([
        'status' => 403,
        'message' => 'Validation Error',
        'errors' => $validator->errors()
      ]);
    }
    if ($request->hasFile('media')) {
      $fileNames = [];
      foreach ($request->file('media') as $file) {
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/images', $fileName);
        $fileNames[] = $fileName;
      }
    }
    $empData = [
      'name' => $request->name,
      'estimated_time' => $request->estimated_time,
      'department_id' => $request->department
    ];
    $training = Training::create($empData);

    $step_names = $request->input('step_name');
    $step_nums = $request->input('step_num');
    $descriptions = $request->input('description');

    // Loop through the input arrays and save the step records
    for ($i = 0; $i < count($step_names); $i++) {
      $empData2 = [
        'step_num' => $step_nums[$i],
        'step_name' => $step_names[$i],
        'media' => $fileNames[$i],
        'description' => $descriptions[$i],
        'training_id' => $training->id
      ];
      TrainingSteps::create($empData2);
    }
    return response()->json([
      'status' => 200,
      'message' => 'Training has been added',
    ]);
  }

  public function edit($id)
  {
    $data = Training::find($id);
    return view('admin.trainings.edit', compact('data'));
  }
  public function steps_view($id)
  {
    $data = Training::find($id);
    $child_data = TrainingSteps::where('training_id', $id)->orderBy('step_num', 'asc')->get();
    return view('admin.trainings.steps', compact('child_data', 'data'));
  }
  public function steps_edit($id)
  {
    $data = TrainingSteps::find($id);
    return view('admin.trainings.edit_steps', compact('data'));
  }
  public function steps_update(Request $request, $id)
  {
    $fileName = '';
    $model = TrainingSteps::find($id);
    if ($request->hasFile('media')) {
      $file = $request->file('media');
      $fileName = time() . '.' . $file->getClientOriginalExtension();
      $file->storeAs('public/images', $fileName);
      if ($model->media) {
        Storage::delete('public/images/' . $model->media);
      }
    } else {
      $fileName = $model->media;
    }

    $data = ['step_name' => $request->step_name, 'step_num' => $request->step_num, 'description' => $request->description, 'media' => $fileName];

    $model->update($data);

    return response()->json([
      'status' => 200,
      'message' => 'Steps has been updated',

    ]);
  }
  public function update(Request $request, $id)
  {
    $model = Training::find($id);
    $data = ['name' => $request->name, 'estimated_time' => $request->estimated_time, 'department_id' => $request->department];
    $model->update($data);
    return response()->json([
      'status' => 200,
      'message' => 'Training has been updated',

    ]);
  }
  public function delete($id)
  {
    $training = Training::find($id);
    $training->steps()->delete();
    $training->delete();
  }

  public function delete_steps($id)
  {
    $model = TrainingSteps::find($id);
    @unlink('storage/images/' . $model->media);
    TrainingSteps::destroy($id);
  }
}
