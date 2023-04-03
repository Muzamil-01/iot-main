<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Training;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view("admin.department.index", ['fetch_route' => route('departments.fetch')]);
  }

  public function fetch()
  {
    $data = Department::all();
    $output = '';
    if ($data->count() > 0) {
      $output .= '<table class="table table-striped table-sm text-center align-middle" id="#tabledata">
            <thead>
              <tr >
                <th>ID</th>
                <th>Department_name</th>
                <th>Descrtion</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';

      foreach ($data as $row) {
        $output .= '<tr>
                <td>' . $row->id . '</td>
                <td>' . $row->dep_name . '</td>
                <td>' . $row->description . '</td>
                <td>
                  <div class="dropdown">
                  <button class="btn btn-dark btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Actions 
                  </button>
                  <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton" >
                    <li><a href="' . route('departments.show', ['id' => $row->id]) . '"  class="dropdown-item text-dark mx-1 h4" ><i class="bi-eye h4" ></i>View</a></li>
                    <li><a href="' . route('departments.edit', ['id' => $row->id]) . '" id="' . $row->id . '" class="dropdown-item text-dark mx-1 h4 editIcon" ><i class="bi-pencil-square h4"></i>Edit</a></li>
                    <li><a href="javascript:void(0)" id="' . $row->id . '" data-url="' . route('departments.delete', $row->id) . '" class="dropdown-item h4 text-dark mx-1 delete_btn"><i class="bi-trash h4"></i>Delete</a></li>
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


  public function fetch_training($did)
  {
    $data = Training::where('department_id', $did)->get();
    $output = '';
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

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view("admin.department.create");
  }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $empData = ['dep_name' => $request->dep_name, 'description' => $request->description];
    Department::create($empData);
    return response()->json([
      'status' => 200,
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  // public function show($id)
  // {
  //   $data = Training::findOrFail($id);
  //   $child_data = TrainingSteps::where('training_id', $id)->orderBy('step_num', 'asc')->get();
  //   return view('', compact('data', 'child_data'));
  // }

  public function show($id)
  {
    $data = Department::find($id);
    // $child_data = Training::where('department_id', $id)->get();
    return view('admin.department.show', compact('data'), ['fetch_route' => route('departments.fetch_training', ['id' => $id])]);
  }
  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $data = Department::find($id);
    return view('admin.department.edit', compact('data'));
  }
  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $model = Department::find($id);
    $data = ['dep_name' => $request->dep_name, 'description' => $request->description];

    $model->update($data);

    return response()->json(['status' => 200]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function delete(Request $request, $id)
  {
    // $model = Department::find($id);
    // @unlink('storage/images/' . $model->Avatar);
    // User::destroy($id);
    Department::destroy($id);
  }
}
