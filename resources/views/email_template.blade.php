<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Domains - Domain Store</title>
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
<link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/>
    <link href="../../plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../../js/jquery-ui.css">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />
    <style type="text/css">
        .formcollapse{
            padding: 12px;
            background-color: #f2f2f2;
        }
    </style>
    <script src="https://cdn.tiny.cloud/1/ec737kwaa6b7gzhcfeqbou1527l0vq52sost94iure5m4thi/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    
    <script>
      tinymce.init({
        selector: '#textarea',
        // selector: '#li',
        branding: false,
        forced_root_block : false,
        placeholder: "Placeholders",
        plugins: "link",
        relative_urls: false,
        plugins: 'noneditable',
        setup: function(editor) {
                editor.on('keyup', function(e) {
                    var query = editor.getContent();
                // alert(query);
                    if (query!='') {
                        var _token = $('input[name="_token"]').val();
                        // alert(_token);
                        $.ajax({
                            url: "{{url('tiny/emailsearch')}}",
                            method: 'POST',
                            data:{query:query , _token:_token},
                            success:function(data){
                                // alert(data);
                                $("#autocompletetinylist").fadeIn(5);
                                $("#autocompletetinylist").html(data);
                            }
                        });
                    }
                });
                $(document).on('click','#tinyli',function(){
                    var id = $(this).data('subjectid');
                    // alert(id);
                    $.ajax({
                      type: "GET",
                      url: "{{URL('tinyemailsearch')}}"+'/'+id,
                      success: function(data) {
                        // tinyMCE.activeEditor.execCommand('mceNewDocument');
                       tinyMCE.activeEditor.execCommand('mceInsertContent',false,data);
                        // alert(data);
                      },
                      error: function(data) {
                        // Stuff
                      }
                    });
                    $("#autocompletetinylist").fadeOut();
                });
            }
        
      });
    </script>
</head>
<body class="theme-red">
    <!-- Page Loader -->
    <!-- <div class="page-loader-wrapper">
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
    </div> -->
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
                    My Email Template
                    <small>Email You enlisted to send Email form</small>

                </h2>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add Email Template(s)
                            </h2>
                            <small>You can add single Email Template</small>
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
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
                @endif
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
<form method="post" action="{{route('emailtemplate.save')}}">
    {{csrf_field()}}
  <div id="autocompleteresultlist"></div>
  <div class="form-group">
    <label for="template_name">Template Name</label>
    <input type="template_name" class="form-control" id="template_name" name="template_name" placeholder="Enter template name">
  </div>
  <div class="form-group">
    <label for="template_body">Template Body</label>
    <textarea name="template_body" class="form-control" id="textarea"></textarea>
  </div>
  <div id="autocompletetinylist"></div> 
  <button type="submit" class="btn btn-primary">Submit</button>
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
    <script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    
    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script> -->
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
    <script src="../../js/jquery-ui.js"></script>
    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>
<script type="text/javascript">
        $(document).ready(function(){
            $('#template_name').keyup(function(){
                var query = $(this).val();
                if (query!='') {
                    var _token = $('input[name="_token"]').val();
                    // alert(_token);
                    $.ajax({
                        url: "{{url('/subject/search')}}",
                        method: 'POST',
                        data:{query:query , _token:_token},
                        success:function(data){
                            $("#autocompleteresultlist").fadeIn(5);
                            $("#autocompleteresultlist").html(data);

                        }

                    });

                }
            });
        });
        $(document).on('click','#li',function(){
            var id = $(this).data('subjectid');
            // alert(id);
            $.ajax({
              type: "GET",
              url: "{{URL('email_subject')}}"+'/'+id,
              success: function(data) {
               $("#template_name").val(data);
                // alert(data);
              },
              error: function(data) {
                // Stuff
              }
            });
            $("#autocompleteresultlist").fadeOut();
        });
    </script>
</body>
</html>