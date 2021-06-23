<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Edit Domains - Domain Store</title>
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

    <link href="../../plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />
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
                    Edit Domains
                    <small>Domains You enlisted to market</small>
                </h2>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Edit Domain(s)
                            </h2>
                            <small>You can add single or multiple domain comma separated</small>
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

                        <form method="POST" action="{{ route('domain.update') }}">
                            @csrf()
                            @foreach($edit_id AS $i=>$edit_domain)
                                <input type="hidden" name="did" value="{{$did}}">
                                <div class="form-group">
                                <label for="domain_url">Domain URL(s)*</label>
                                    <div class="form-line">
                                       
                                        <textarea name="domain_url" id="domain_url" cols="30" rows="10" class="form-control">{{$edit_domain->url}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                <label for="domain_template">Web View* <small style="margin-left: 20px"><a href="javascript::void()" id="preview">Preview</a></small></label>
                                
                                    <div class="form-line">
                                    <select class="form-control show-tick" id="domain_template" name="domain_template">
                                        <option value="default">Default</option>
                                        <option value="t1" {{$did != 0 && $found[0]->view_page == 't1' ? 'selected' : ''}}>Template1</option>
                                        <option value="t2" {{$did != 0 && $found[0]->view_page == 't2' ? 'selected' : ''}}>Template2</option>
                                    </select>
                                    </div></div>
                                    <div class="form-group">
                                    <label for="form_template">Form Template @if(count($f_templates)<1)<small style="margin-left: 20px"><a href="{{route('temp.index')}}" id="createForm">Create New</a></small>@endif</label>
                                
                                    <div class="form-line">
                                    <select class="form-control show-tick" id="form_template" name="form_template">
                                        <option value="0">-- Please select --</option>
                                        @foreach($f_templates AS $ftemp)
                                            <option value="{{$ftemp->id}}" {{$did != 0 && $found[0]->template_id == $ftemp->id ? 'selected' : ''}}>{{$ftemp->template_name}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="form_template">Create Template<small style="margin-left: 20px">Write HTML</small></label>
                                
                                    <div class="form-line">
                                    <textarea name="domain_html" id="domain_html" cols="30" rows="10" class="form-control">{{$edit_domain->domain_html}}</textarea>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">{{$did != 0 ? 'Save Changes' : 'Save' }}</button>
                                @endforeach
                            </form>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>URL</th>
                                            <th>Status</th>
                                            <th>View Page</th>
                                            <th>Domain HTML</th>
                                            <th>Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>URL</th>
                                            <th>Status</th>
                                            <th>View Page</th>
                                            <th>Domain HTML</th>
                                            <th>Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($domains AS $i=>$domain)
                                    
                                        <tr>
                                            <td>{{$i+1}}</td>
                                            <td>{{$domain->url}}</td>
                                            <td>Active</td>
                                            <td>{{ formate_template_name($domain->view_page) }}</td>
                                            <td>
                                                @if($domain->template_name == '')
                                                    NO HTML
                                                @else
                                                    {{$domain->template_name}}
                                                @endif
                                            </td>
                                            
                                            <td>
                                                @if($domain->domain_html == '')
                                                         NULL
                                                    @else 
                                                        {{$domain->domain_html}}
                                                    @endif
                                                
                                            </td>

                                            <td>{{date('d-m-Y', strtotime($domain->created_at))}}</td>
                                            <td><div class="btn-group">
                                            <button class="btn btn-info btn-sm view-domain" data-did="{{$domain->id}}" data-url="{{route('domain.view', $domain->id)}}">View</button>
                                            <!-- <button class="btn btn-primary btn-sm edit-domain" data-did="{{$domain->id}}">Edit</button> -->
                                            <a class="btn btn-primary btn-sm edit-domain" href="{{route('domain.show', $domain->id)}}">Edit</a>
                                            <button class="btn btn-danger btn-sm del-domain" data-did="{{$domain->id}}" data-url="{{route('domain.del', $domain->id)}}">Delete</button></div></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>
    
    <!-- template preview modal -->
    <div class="modal fade" id="templateModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel"></h4>
                        </div>
                        <div class="modal-body">
                        <img src="https://colorlib.com/wp/wp-content/uploads/sites/2/wisdom-free-template.jpg" alt="" class="img" style="height:100%; width:100%" id="template_img">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>

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
            //showNotification('bg-blue-grey', 'all done is done', 'bottom', 'right', null, null); 
            swal("Done!", "{{session('success')}}", "success");
            @endif

            // $(".edit-domain").click(function(){
            //     window.location = "{{url('domain')}}/"+$(this).attr("data-did");
            // });

            $(".del-domain").click(function(){
                let durl = $(this).attr("data-url");

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
            });

            $(".view-domain").click(function(){
                window.open($(this).attr("data-url"), "_blank");
            });

            $("#preview").click(function(){
                let selected = $("#domain_template").val();
                let tmp_images = {'default': '{{asset("template_images/default.png")}}', 't1': '{{asset("template_images/t1.png")}}', 't2': '{{asset("template_images/t2.png")}}'};
                let ttitles = {'default': 'Default Template Preview', 't1': 'Template1 Preview', 't2': 'Template2 Preview'}
                $("#defaultModalLabel").text(ttitles[selected]);
                $("#template_img").attr('src', tmp_images[selected]);
                $("#templateModal").modal();
            });

            $("#createForm").click(function(){
                window.location = $(this).attr("href");
            });
        });
    </script>
</body>

</html>
