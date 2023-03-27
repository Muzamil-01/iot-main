<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>{{ env('APP_NAME') }}</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    {{-- <link href="assets/img/favicon.png" rel="icon" /> --}}
    <link href="{{ asset('admin/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />
    {{-- ajax --}}
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css' />
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />
    {{-- ajax end  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/6.0.39/css/materialdesignicons.min.css">

    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
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
    @include('admin.layouts.sidebar')
    <!-- End Sidebar-->
    <main class="main" id="main">
        @yield('main-section')
    </main>
    <!-- ======= Footer ======= -->


    <!-- Vendor JS Files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

<<<<<<< HEAD
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
=======
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    {{-- <script src="{{asset('assets/js/jquery.js')}}"></script> --}}
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(function() {

            //   edit ajax 
            $(document).on('submit', "#edit_form", function(e) {
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
                        } else {

                        }
                        $("button[type='submit']").text('Update');

                    }
                });
            });

            //   add ajax
            $(document).on('submit', "#add_form", function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                var url = $(this).attr('action');
                $("button[type='submit']").text('Adding...');
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
                                'Added!',
                                response.message,
                                'success'
                            )
                            fetchAllEmployees();
                        }
                        $("button[type='submit']").text('Add');

                        $("#add_form")[0].reset();
                        // $("#addEmployeeModal").modal('hide');
                    }
                });
            });



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

        @if (isset($fetch_route))
            // fetch all employees ajax request
            fetchData();

            function fetchData() {
                $.ajax({
                    url: '{{ $fetch_route }}',
                    method: 'get',
                    success: function(response) {
                        $("#show_all_employees").html(response);
                        $("table").DataTable({
                            order: [0, 'desc']
                        });
                    }
                });
            }
        @endif
    </script>
>>>>>>> 654c7da2e303332705681b686b68cdcbca47570a


</body>

</html>
