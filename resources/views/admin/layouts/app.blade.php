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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@6.3.95/css/materialdesignicons.min.css">

    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />


    @yield('css')
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


    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
            $('.select2').select2();

            //   edit ajax 
            $(document).on('submit', "#edit_form", function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                var url = $(this).attr('action');
                var prev_button_text = $("button[type='submit']").html();
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
                        $("button[type='submit']").html(prev_button_text);

                    }
                });
            });

            //   add ajax
            $(document).on('submit', "#add_form", function(e) {
                e.preventDefault();
                $('.validation_errors_mesessag').remove();
                const fd = new FormData(this);
                var url = $(this).attr('action');
                var prev_button_text = $("button[type='submit']").html();
                $("button[type='submit']").text('Please wait...');
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
                                'Success!',
                                response.message,
                                'success'
                            )
                            if (response.redirect_route != undefined) {
                                window.location.href = response.redirect_route;
                            }
                            $("button[type='submit']").html(prev_button_text);
                            $("#add_form")[0].reset();
                        } else if (response.status == 403) {
                            $.each(response.errors, function(i, err) {
                                // console.log(i + err);
                                $("[name='" + i + "']").parent('div').append(
                                    '<p class="text-danger validation_errors_mesessag">' +
                                    i + ' ' +
                                    err + '</p>');
                            });
                            $("button[type='submit']").html(prev_button_text);
                        }
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
                                'Your data has been deleted.',
                                'success'
                            )
                            fetchData();
                        }
                    });
                }
            })
        });


        function set_dropzone() {
            document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
                const dropZoneElement = inputElement.closest(".drop-zone");

                dropZoneElement.addEventListener("click", (e) => {
                    inputElement.click();
                });

                inputElement.addEventListener("change", (e) => {
                    if (inputElement.files.length) {
                        updateThumbnail(dropZoneElement, inputElement.files[0]);
                    }
                });

                dropZoneElement.addEventListener("dragover", (e) => {
                    e.preventDefault();
                    dropZoneElement.classList.add("drop-zone--over");
                });

                ["dragleave", "dragend"].forEach((type) => {
                    dropZoneElement.addEventListener(type, (e) => {
                        dropZoneElement.classList.remove("drop-zone--over");
                    });
                });

                dropZoneElement.addEventListener("drop", (e) => {
                    e.preventDefault();

                    if (e.dataTransfer.files.length) {
                        inputElement.files = e.dataTransfer.files;
                        updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
                    }

                    dropZoneElement.classList.remove("drop-zone--over");
                });
            });
        }


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
        var i = 0;
        var step = 1;
        $("#addmorestep").on("click", function() {
            ++step;
            ++i;
            var newStep = $(`           
        <div class="training-bulk" style="display:none;">
            <h1 class="card-title">Step ` + step + ` </h1>
            <label for="step" class="training-label-text">Name of this step</label>
                                <input type="text" class="form-control" name="step_name[]">
            <label for="step" class="training-label-text">Step-numbers</label>

                                <input type="text" class="form-control" name="step_num[]">
            <div class="drop-zone step-image2">
                <span class="drop-zone__prompt">Drop file here or click to upload</span>
                <input type="file" name="media[]" class="drop-zone__input">
                </div>  
                <label for="step" class="training-label-text">Description</label>
            <textarea name="description[]" id="" cols="30" rows="2" class="form-control"></textarea>      
            <div class="row">
                <div class="offset-9 col-2 mt-4">
                    <button type="button" class="btn btn-sm btn-danger add-btn2" id="RemoveBtn"><i class="bi bi-cloud-minus"></i> Remove</button>          
                </div>
            </div>
        </div>
    `);
            $("#step").append(newStep);
            newStep.fadeIn();
            set_dropzone();

        });

        $(document).on("click", "#RemoveBtn", function() {
            $(this).parents(".training-bulk").fadeOut(function() {
                $(this).remove();
            });
        });
    </script>

    @yield('js')

</body>

</html>
