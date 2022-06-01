<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Quản trị Web</title>
    <link rel="shortcut icon" href="image/fixed/logo.png" type="image/x-icon" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="admin/style.css">
    <link rel="stylesheet" href="admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="https://www.vnkgu.edu.vn/public/images/logo.png" alt="AdminLTELogo"
                height="60" width="60">
        </div> --}}

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="" class="nav-link">Xem Trang Chủ</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="https://zalo.me/0365774667" class="nav-link">Bảo trì</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="https://www.teamviewer.com/vi/" class="nav-link">Tải Teamviewer</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Google Analytics</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Google Search Console</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="https://picsum.photos/200/200" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Học Laravel</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-header">Chức năng chính</li>
                        <li class="nav-item">
                            <a href="slider" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Slider
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="content" class="nav-link @if (isset($tab) and $tab == 'slider') active-menu @endif">
                                <i class="nav-icon fas fa-scroll"></i>
                                <p>
                                    Quản lý nội dung
                                    {{-- <span class="right badge badge-info">2</span> --}}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="util" class="nav-link @if (isset($tab) and $tab == 'slider') active-menu @endif">
                                <i class="nav-icon fas fa-gamepad"></i>
                                <p>
                                    Các tiện ích
                                    {{-- <span class="right badge badge-info">2</span> --}}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="icon-box" class="nav-link @if (isset($tab) and $tab == 'slider') active-menu @endif">
                                <i class="nav-icon fas fa-icons"></i>
                                <p>
                                    Các icon thông tin
                                    {{-- <span class="right badge badge-info">2</span> --}}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="product" class="nav-link @if (isset($tab) and $tab == 'slider') active-menu @endif">
                                <i class="nav-icon fa-brands fa-product-hunt"></i>
                                <p>
                                    Các sản phẩm
                                    {{-- <span class="right badge badge-info">2</span> --}}
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">Authentication</li>
                        <li class="nav-item">
                            <a href="/logout" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                                <p>
                                    Đăng xuất
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        @yield('content')

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2025.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Laravel Framework</b> 8.0.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- bootstrap tag inpt -->
    <script src="admin/plugins/bootstrap-tag-input/all.min.js"></script>
    <!-- AdminLTE App -->
    <script src="admin/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="admin/dist/js/demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/TableDnD/0.9.1/jquery.tablednd.js"
        integrity="sha256-d3rtug+Hg1GZPB7Y/yTcRixO/wlI78+2m08tosoRn7A=" crossorigin="anonymous"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="admin/dist/js/pages/dashboard.js"></script>
    <script src="admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <script src="admin/plugins/dropzone/min/dropzone.min.js"></script>
    <script src="admin/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="admin/plugins/ckeditor/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/xml/xml.min.js"></script>
    <script>
        const csrfToken = '{{ csrf_token() }}';
        const baseUrl = '{{ config('app.url') }}';
        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

        //Preview image
        $('.input-image').on('change', function(e) {
            $('.preview-image').css({
                'opacity': '0'
            }).attr('src', "");
            let src = URL.createObjectURL(event.target.files[0]);
            $('.preview-image').css({
                'opacity': '1'
            }).attr('src', src);
        });

        //Preview util
        $('.input-image-util').on('change', function(e) {
            $('.preview-image-util').css({
                'opacity': '0'
            }).attr('src', "");
            let src = URL.createObjectURL(event.target.files[0]);
            $('.preview-image-util').css({
                'opacity': '1'
            }).attr('src', src);
        });

        $(".drag-table").tableDnD();

        var htmlEditor = CodeMirror.fromTextArea(document.getElementById("code"), {
            lineNumbers: true,
            name: "htmlmixed",
        });
        htmlEditor.setSize(null, 500);
    </script>
    <script src="admin/plugins/ajax.js"></script>
</body>
</html>
