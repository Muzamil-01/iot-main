<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Iot</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    {{-- <link href="assets/img/favicon.png" rel="icon" /> --}}
    <link href="{{asset('admin/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />
      {{-- ajax --}}
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css' />
      <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />
    {{-- ajax end  --}}
    
    <!-- Vendor CSS Files -->
    <link
      href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}"
      rel="stylesheet"
    />
    <link
      href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}"
      rel="stylesheet"
    />
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
  </head>

  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
      <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
          <span class="d-none d-lg-block text-dark">touch4safety</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </div>
      <!-- End Logo -->

      <!-- End Search Bar -->

      <!-- End Icons Navigation -->
    </header>
    <!-- End Header -->
         <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="bi bi-grid"></i>
          <span>Material inc.</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->
      <li class="nav-item">
        <span class="text-dark">Country</span>
        <a
          class="nav-link collapsed"
          data-bs-target="#components-nav"
          data-bs-toggle="collapse"
          href="#"
        >
          <span class="text-dark">Select Country</span
          ><i class="bi bi-chevron-down ms-auto mb-3"></i>
        </a>
  
        <ul
          id="components-nav"
          class="nav-content collapse"
          data-bs-parent="#sidebar-nav"
        >
          <li>
            <a href="components-alerts.html">
              <i class="bi bi-circle"></i><span>Country 1</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Components Nav -->
  
      <li class="nav-item">
        <span class="text-dark">Branch</span>
  
        <a
          class="nav-link collapsed text-dark border-bottom border-2"
          data-bs-target="#forms-nav"
          data-bs-toggle="collapse"
          href="#"
        >
          <span>Select Branch</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul
          id="forms-nav"
          class="nav-content collapse"
          data-bs-parent="#sidebar-nav"
        >
          <li>
            <a href="forms-elements.html">
              <i class="bi bi-circle"></i><span>Branch 1</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Forms Nav -->
  
      <li class="nav-heading">Pages</li>
  
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('building')}}">
          <i class="bi bi-building-fill"></i>
          <span>Buildings</span>
        </a>
      </li>
      <!-- End Profile Page Nav -->
  
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('items')}}">
          <i class="bi bi-plus"></i>
          <span>items</span>
        </a>
      </li>
      <!-- End F.A.Q Page Nav -->
  
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('sensors')}}">
          <i class="bi bi-gear"></i>
          <span>Sensors</span>
        </a>
      </li>
      <!-- End Contact Page Nav -->
  
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('suppliers')}}">
          <i class="bi bi-cart3"></i>
          <span>Suppliers</span>
        </a>
      </li>
      <!-- End Register Page Nav -->
  
      <li class="nav-item">
        <a
          class="nav-link collapsed"
          data-bs-target="#people"
          data-bs-toggle="collapse"
          href="#"
        >
        <i class="bi bi-person"></i>
  
          <span >People</span
          ><i class="bi bi-chevron-down ms-auto mb-3"></i>
        </a>
  
        <ul
          id="people"
          class="nav-content collapse"
          data-bs-parent="#sidebar-nav"
        >
          <li>
            <a href="{{route('people')}}">
              <i class="bi bi-circle"></i><span>People</span>
            </a>
            <a href="{{route('allPeoples')}}">
              <i class="bi bi-circle"></i><span>All Peoples</span>
            </a>
          </li>
        </ul>
      </li>
      
      <!-- End Login Page Nav -->
  
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('trainings')}}">
          <i class="bi bi-book"></i>
          <span>Trainings</span>
        </a>
      </li>
      <!-- End Error 404 Page Nav -->
  
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('issues')}}">
          <i class="bi bi-exclamation-triangle"></i>
          <span>issues</span>
        </a>
      </li>
      <li class="nav-item">
  
        <a class="btn btn-outline-primary w-100" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
  
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </li>
  {{--     
      <li class="nav-item">
        <button class="btn btn-outline-primary w-100">Logout</button>
      </li> --}}
      <!-- End Blank Page Nav -->
    </ul>
  </aside>
  <!-- End Sidebar-->
        @yield('main-section')
     <!-- ======= Footer ======= -->
 <footer id="footer" class="footer">

    <div class="credits">
    </div>
  </footer>

  <a
    href="#"
    class="back-to-top d-flex align-items-center justify-content-center"
    ><i class="bi bi-arrow-up-short"></i
  ></a>

  <!-- Vendor JS Files -->

  <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>


  <script>
    $(function() {

    //   edit ajax 
    $(document).on('submit',"#edit_form",function(e) {
    e.preventDefault();
    const fd = new FormData(this);
    var url = $(this).attr('action');
    $("button[type='submit']").text('Updating...');
    $.ajax({
        url: url,
        method: 'post',
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response) {
        if (response.status == 200) {
            
            Swal.fire(
            'Updated!',
            response.message,
            'success'
            )
            // fetchAllEmployees();
        }else{
            
        }
        // $("#edit_employee_btn").text('Update Employee');
        // $("#edit_employee_form")[0].reset();
        // $("#editEmployeeModal").modal('hide');
        }
    });
    });
      
    //   add ajax
    // $(document).on('submit',"#add_form",function(e) {
    //     e.preventDefault();
    //     const fd = new FormData(this);
    //     var url = $(this).attr('action');
    //     $("button[type='submit']").text('Adding...');
    //     $.ajax({
    //       url: url,
    //       method: 'post',
    //       data: fd,
    //       cache: false,
    //       contentType: false,
    //       processData: false,
    //       dataType: 'json',
    //       success: function(response) {
    //         if (response.status == 200) {
    //           Swal.fire(
    //             'Added!',
    //             response.message,
    //             'success'
    //           )
    //           fetchAllEmployees();
    //         }
    //         $("#add_employee_btn").text('Add Employee');
    //         $("#add_employee_form")[0].reset();
    //         $("#addEmployeeModal").modal('hide');
    //       }
    //     });
    //   });



    });
    // delete ajax
    $(document).on('click', '.delete_btn', function(e) {
        e.preventDefault();
        var url = $(this).attr('data-url');
        let id = $(this).attr('id');
        let csrf = '{{ csrf_token() }}';
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: url,
              method: 'delete',
              data: {
                id: id,
                _token: csrf
              },
              success: function(response) {
                console.log(response);
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
                fetchData();
              }
            });
          }
        })
      });

      // fetch all employees ajax request
      fetchData();

      function fetchData() {
        $.ajax({
          url: '{{ route('fetchAll') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_employees").html(response);
            $("table").DataTable({
              order: [0, 'desc']
            });
          }
        });
      }
  </script>
</body>
</html>
