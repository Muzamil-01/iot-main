
@extends('admin.layouts.app')

@section('main-section')
<main id="main" class="main">
<div class="container">
  <div class="row my-5">
    <div class="col-lg-12">
      <div class="card shadow">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
          <h3 class="text-dark">Manage People</h3>
          <a href="{{route('add')}}" class="btn btn-light"><i
              class="bi-plus-circle me-2"></i>Add New Employee</a>
        </div>
        <div class="card-body" id="show_all_employees">
          <h1 class="text-center text-secondary my-5">Loading...</h1>
        </div>
      </div>
    </div>
  </div>
</div>
</main> 
@endsection
