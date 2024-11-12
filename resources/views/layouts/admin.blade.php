<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Dynamic Title -->
    <title>@yield('title', 'Home')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('admin/img/kaiadmin/favicon.ico') }}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('admin/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                "families": ["Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ['{{asset('
                    ')}}assets/css/fonts.min.css'
                ]
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });

    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/kaiadmin.min.css') }}" />

    <!-- CSS for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('admin/css/demo.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="wrapper">

        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="{{route('dashboard')}}" class="logo">
                        @php
                            $websetting = DB::table('web_settings')->first();
                        @endphp
                        <img src="{{ asset('storage/' . $websetting->logo) }}" alt="navbar brand" class="navbar-brand" height="50" />
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
                <!-- End Logo Header -->
            </div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item active">
                            <a href="{{route('dashboard')}}">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('company.index')}}">
                                <i class="fa fa-list"></i>
                                <p>Company</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('client.index')}}">
                                <i class="fas fa-user"></i>
                                <p>Clients</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('vendor.index')}}">
                                <i class="fas fa-user-edit"></i>
                                <p>Vendors</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('bank.index')}}">
                                <i class="fas fa-university"></i>
                                <p>Banks</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('chequepay.index')}}">
                                <i class="fas fa-money-check-alt"></i>
                                <p>Cheque Pay</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('chequereceive.index')}}">
                                <i class="fa fa-book"></i>
                                <p>Cheque Receive</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#forms">
                                <i class="far fa-chart-bar"></i>
                                <p>Reports</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="forms">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{route('chequepayment-register.index')}}">
                                            <span class="sub-item">Cheque Payment Register</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('chequereceive-register.index')}}">
                                            <span class="sub-item">Cheque Receive Register</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="sub-item">Cheque Book Status Report</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#users">
                                <i class="fas fa-pen-square"></i>
                                <p>Manage users</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="users">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{route('manageuser.index')}}">
                                            <span class="sub-item">Users</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('manageuserrole.index')}}">
                                            <span class="sub-item">Role</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="sub-item">Permission</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('websetting.index')}}">
                                <i class="fas fa-cog"></i>
                                <p>Web Setting</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="main-panel">

            @include('layouts.header')

            <div class="container">
                <div class="page-inner">

                    @yield('content')

                </div>
            </div>

            @include('layouts.footer')
        </div>


    </div>

    <!--   Core JS Files   -->
    <script src="{{asset('admin/js/core/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('admin/js/core/popper.min.js')}}"></script>
    <script src="{{asset('admin/js/core/bootstrap.min.js')}}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{asset('admin/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

    <!-- Moment JS -->
    <script src="{{asset('admin/js/plugin/moment/moment.min.js')}}"></script>

    <!-- Chart JS -->
    <script src="{{asset('admin/js/plugin/chart.js/chart.min.js')}}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{asset('admin/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- Chart Circle -->
    <script src="{{asset('admin/js/plugin/chart-circle/circles.min.js')}}"></script>

    <!-- Datatables -->
    <script src="{{asset('admin/js/plugin/datatables/datatables.min.js')}}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{asset('admin/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{asset('admin/js/plugin/jsvectormap/jsvectormap.min.js')}}"></script>
    <script src="{{asset('admin/js/plugin/jsvectormap/world.js')}}"></script>

    <!-- Dropzone -->
    <script src="{{asset('admin/js/plugin/dropzone/dropzone.min.js')}}"></script>
    <!-- Fullcalendar -->
    <script src="{{asset('admin/js/plugin/fullcalendar/fullcalendar.min.js')}}"></script>
    <!-- DateTimePicker -->
    <script src="{{asset('admin/js/plugin/datepicker/bootstrap-datetimepicker.min.js')}}"></script>
    <!-- Bootstrap Tagsinput -->
    <script src="{{asset('admin/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>
    <!-- jQuery Validation -->
    <script src="{{asset('admin/js/plugin/jquery.validate/jquery.validate.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('admin/js/plugin/summernote/summernote-lite.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('admin/js/plugin/select2/select2.full.min.js')}}"></script>
    <!-- Sweet Alert -->
    <script src="{{asset('admin/js/plugin/sweetalert/sweetalert.min.js')}}"></script>
    <!-- Owl Carousel -->
    <script src="{{asset('admin/js/plugin/owl-carousel/owl.carousel.min.js')}}"></script>
    <!-- Magnific Popup -->
    <script src="{{asset('admin/js/plugin/jquery.magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    <!-- Kaiadmin JS -->
    <script src="{{asset('admin/js/kaiadmin.min.js')}}"></script>

    @stack('script')
    <script>
        $('#lineChart').sparkline([102, 109, 120, 99, 110, 105, 115], {
            type: 'line',
            height: '70',
            width: '100%',
            lineWidth: '2',
            lineColor: '#177dff',
            fillColor: 'rgba(23, 125, 255, 0.14)'
        });

        $('#lineChart2').sparkline([99, 125, 122, 105, 110, 124, 115], {
            type: 'line',
            height: '70',
            width: '100%',
            lineWidth: '2',
            lineColor: '#f3545d',
            fillColor: 'rgba(243, 84, 93, .14)'
        });

        $('#lineChart3').sparkline([105, 103, 123, 100, 95, 105, 115], {
            type: 'line',
            height: '70',
            width: '100%',
            lineWidth: '2',
            lineColor: '#ffa534',
            fillColor: 'rgba(255, 165, 52, .14)'
        });

    </script>
    <script>
        $(document).ready(function () {
            $('.select_2_multiple').select2();
            $('#datatable').DataTable();

            $('#multi-filter-select').DataTable({
                "pageLength": 5,
                initComplete: function () {
                    this.api().columns().every(function () {
                        var column = this;
                        var select = $(
                                '<select class="form-select"><option value=""></option></select>'
                            )
                            .appendTo($(column.footer()).empty())
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                        column.data().unique().sort().each(function (d, j) {
                            select.append('<option value="' + d + '">' + d +
                                '</option>')
                        });
                    });
                }
            });

            // Add Row
            $('#add-row').DataTable({
                "pageLength": 5,
            });

            var action =
                '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

            $('#addRowButton').click(function () {
                $('#add-row').dataTable().fnAddData([
                    $("#addName").val(),
                    $("#addPosition").val(),
                    $("#addOffice").val(),
                    action
                ]);
                $('#addRowModal').modal('hide');

            });


        });

    </script>
    @if (session('success'))
    <script>
        $(document).ready(function () {
            $.notify({
                // Options
                message: '{{ session('success') }}'
            }, {
                // Settings
                type: 'success',
                delay: 3000,
                allow_dismiss: true,
                placement: {
                    from: "top",
                    align: "right"
                }
            });
        });

    </script>
    @endif

    @if (session('danger'))
    <script>
        $(document).ready(function () {
            $.notify({
                // Options
                message: '{{ session('danger') }}'
            }, {
                // Settings
                type: 'danger',
                delay: 3000,
                allow_dismiss: true,
                placement: {
                    from: "top",
                    align: "right"
                }
            });
        });

    </script>
    @endif
    @if (session('error'))
    <script>
        $(document).ready(function () {
            $.notify({
                // Options
                message: '{{ session('error ') }}'
            }, {
                // Settings
                type: 'danger',
                delay: 3000,
                allow_dismiss: true,
                placement: {
                    from: "top",
                    align: "right"
                }
            });
        });

    </script>
    @endif
    @yield('scripts')

</body>

</html>
