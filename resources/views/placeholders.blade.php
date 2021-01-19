<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Placeholders - Domain Store</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="../../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />

    <link href="../../plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    @include('layouts.top_bar')
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        @include('layouts.left_sidebar')
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        @include('layouts.right_sidebar')
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    My Placeholder Variable
                    <small>These Variables will be Rendered in Your Domain's Landing Page</small>
                </h2>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add Variables
                            </h2>
                            <small style="color:red">Use <strong>@</strong> before every variable name to avoid similar words conflict</small>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">

                        <form method="POST" action="{{ route('ph.store') }}">
                        <div class="placeForm">
                            @csrf()
                            @if(!$variables->isEmpty())
                            @foreach($variables AS $vs)
                            <div class="row pRow">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Variable Name</label>
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="e.g @primary_key" name="variable_name[]" required value="{{ $vs->variable_name}}">
                                            </div>
                                    </div>
                                </div>

                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Variable Value</label>
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="e.g example@web.com" name="variable_value[]" required value="{{ $vs->variable_value}}">
                                            </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                <button type="button" class="btn btn-danger delRow">X</button>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="row pRow">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Variable Name</label>
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="e.g @primary_key" name="variable_name[]" required value="">
                                            </div>
                                    </div>
                                </div>

                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Variable Value</label>
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="e.g example@web.com" name="variable_value[]" required value="">
                                            </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                <button type="button" class="btn btn-danger delRow">X</button>
                                </div>
                            </div>
                            @endif
                            </div>  
                                <button type="button" class="btn btn-info addRow m-t-15 waves-effect">Add More Variables</button>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">{{'Save' }}</button>

                            </form>
                            <br>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <script src="../../plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script src="../../js/pages/ui/notifications.js"></script>
    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/tables/jquery-datatable.js"></script>
    
    <!-- sweet alert -->
    <script src="../../plugins/sweetalert/sweetalert.min.js"></script>
    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>
    

    <script>
        $(document).ready(function(){
            @if(session('success'))
            //showNotification('bg-blue-grey', 'work done', 'bottom', 'right', null, null);
            swal("Done!", "{{session('success')}}", "success");
            @endif


            $(".addRow").click(function(e){
                console.log('clickkk');
                $(".pRow:first").clone().appendTo($(".placeForm"));
                $(".pRow:last input").val('');
            });

            $(document).on('click', '.delRow', function(){
                if($('.delRow').length > 1)
                    $(this).parent().parent().remove();
            });
            
        });
    </script>
</body>

</html>
