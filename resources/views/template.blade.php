<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Templates - Domain Store</title>
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


    <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <link href="../../plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />

    <style type="text/css">
    .get-data{
        display: none !important;
    }
    </style>
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
                    My Templates
                    <small>Templates for my Domains</small>
                </h2>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            
                            <label for="domain_template">All Domain Templates</label>
                                
                                    <div class="form-line">
                                    <select class="form-control show-tick" name="domain_template">
                                        <option value="">-- Create New Template --</option>
                                        @foreach($all_temps as $temp)
                                            <option value="{{$temp['id']}}">{{$temp['template_name']}}</option>
                                        @endforeach
                                    </select>
                                    </div>
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
                        <h4>
                                {{ !empty($tempData) ? 'Update' : 'Create'}} Form Template
                            </h4>
                        <div class="row">
                            <div class="col-sm-6">
                            <label for="template_name">Template Name</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="template_name" class="form-control" placeholder="e.g Contact Form" name="template_name" value="{{ !empty($tempData) ? $tempData[0]['template_name'] : '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-11">
                                    <div id="fb-editor"></div>    
                                </div>

                                <div class="col-sm-1">
                                @foreach($ph_variables AS $v)
                            <span class="label bg-black" data-toggle="tooltip" data-placement="auto" title="{{$v->variable_value}}" data-original-title="{{$v->variable_value}}">{{$v->variable_name}}</span>
                            @endforeach
                                </div>
                            </div>
                            

                            <!-- <div class="row">
                            
                            </div> -->
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

    <!-- Slimscroll Plugin Js -->
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <script src="../../plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script src="../../js/pages/ui/notifications.js"></script>
    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
  <!-- <script src="https://formbuilder.online/assets/js/form-render.min.js"></script> -->
  
  <!-- sweet alert -->
  <script src="../../plugins/sweetalert/sweetalert.min.js"></script>
  <script src="../../js/pages/ui/tooltips-popovers.js"></script>
  <script>
  jQuery(function($) {
    $(document.getElementById('fb-editor')).formBuilder({disableFields: ['file', 'hidden'], 
    @if(!empty($tempData))
    actionButtons: [{
    id: 'smile',
    className: 'btn btn-danger',
    label: 'Delete',
    type: 'button',
    events: {
    click: function() {
        @if(!empty($tempData))
            let durl = "{{route('temp.del', $tempData[0]['id'])}}";
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this Domain!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                }, function () {
                    window.location = durl;
                    //swal("Deleted!", "Your imaginary file has been deleted.", "success");
                });

        @endif
    }
  }
  }]@endif}).promise.then(function(formBuilder){
        @if(!empty($tempData))
            formBuilder.actions.setData('{!! $tempData[0]["template_code"] !!}');
        @endif

        // save button
        $(document).on('click', ".save-template", function(){

            let tmp_name = $("#template_name").val();
            
            if(!tmp_name)
            {
                swal({title:"Input Missing!", text:"Form Name can't be Empty.", type:"error"},function(){
                    setTimeout(function(){ $("#template_name").focus(); }, 500);
                });
                $("#template_name").focus();
                //showNotification('bg-red', "Form Name can't be Empty", 'bottom', 'right', null, null);
                
                return;
            }

            $.ajax({
                url: '{{ route("temp.form") }}',
                method: 'post',
                data: {'template_name': tmp_name, 'formJSON': JSON.stringify(JSON.parse(formBuilder.actions.getData('json', true))), '_token': '{{ csrf_token()}}', 'tid': {{!empty($tempData) ? $tempData[0]["id"] : 0 }}},
                success: function(dta){
                    swal("Done!", "Form Template Saved Successfully", "success");
                    $("#template_name").val('');
                    formBuilder.actions.clearFields();
                    //showNotification('bg-blue-grey', 'Form Saved Successfully', 'bottom', 'right', null, null);
                },
                error: function(err){
                    swal("Error!", err.responseJSON.msg, "error");
                    //showNotification('bg-red', 'Error! Form Saving Failed', 'bottom', 'right', null, null);
                }
            });
        });
    });

  });

/*
  var formRenderOptions = {
  formData: '[{"type":"text","label":"Text Field","name":"text-1526099104236","subtype":"text"}]'
}
var formRenderInstance = $('#fb-editor').formRender(formRenderOptions); */
  </script>

    <script>
        $(document).ready(function(){

            $('.clear-all').off();
            $(document).on('click', '.clear-all', function(){
                console.log('all ok');
            });

            @if(session('success'))
            swal("Done!", "{{session('success')}}", "success");
            //showNotification('bg-blue-grey', 'work done', 'bottom', 'right', null, null); 
            @endif

            @if(!empty($tempData))
            $("select[name='domain_template']").val({{$tempData[0]['id']}});
            @endif
            $("select[name='domain_template']").change(function(e){
                if($(this).val())
                {
                    window.location = "{{route('temp.index')}}/"+$(this).val();
                }
                else
                    window.location = "{{route('temp.index')}}";
            });
        });
    </script>
</body>

</html>
