<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Queries - Domain Store</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap-tagsinput.css') }}">
    <!-- Bootstrap Core Css -->
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../../css/select.css" rel="stylesheet" />
    <!-- Waves Effect Css -->
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="../../plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="../../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../js/editor.css" rel="stylesheet">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />
    <script src='select2/dist/js/select2.min.js' type='text/javascript'></script>
    <!-- CSS -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href='select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>
    <style type="text/css">
        .tag{
            padding: 3px 3px 3px 3px !important;
            color: #fff !important;
            font-weight: 700 !important;
            cursor: default !important;
            border: none !important;
            border-radius: 4px !important;
            box-shadow: none !important;
            background: #267e54 !important;
            background-image: none!important;
            background-color: #267e54 !important;
        }
        .formcollapse{
            padding: 12px;
            background-color: #f2f2f2;
        }
        .select2-container .select2-selection--single{
            height:34px !important;
            width: 180px !important;
        }
        .select2-container--default .select2-selection--single{
            border: 1px solid #ccc !important; 
             border-radius: 0px !important; 
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 26px;
            position: absolute;
            top: 1px;
            right: -74px;
            width: 20px;
        }
        
    </style>

    <script src="https://cdn.tiny.cloud/1/ec737kwaa6b7gzhcfeqbou1527l0vq52sost94iure5m4thi/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
      tinymce.init({
        selector: '#mytextarea',
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
                            url: "{{url('/tiny/search')}}",
                            method: 'POST',
                            data:{query:query , _token:_token},
                            success:function(data){
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
                      url: "{{URL('tinysearch')}}"+'/'+id,
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

        // setup: function(ed) {
        //     ed.on('keyup', function(e) {
        //         var query = $(this).getContent();
                // alert(query)
                // if (query!='') {
                //     var _token = $('input[name="_token"]').val();
                //     // alert(_token);
                //     $.ajax({
                //         url: "{{url('/subject/search')}}",
                //         method: 'POST',
                //         data:{query:query , _token:_token},
                //         success:function(data){
                //             $("#autocompletetinylist").fadeIn(5);
                //             $("#autocompletetinylist").html(data);

                //         }

                //     });

                // }
        //     });
        // }
        // plugins: 'image code',
        //   toolbar: 'undo redo | link image | code',
        //   /* enable title field in the Image dialog*/
        //   image_title: true,
        //   /* enable automatic uploads of images represented by blob or data URIs*/
        //   automatic_uploads: true,
        //   /*
        //     URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
        //     images_upload_url: 'postAcceptor.php',
        //     here we add custom filepicker only to Image dialog
        //   */
        //   file_picker_types: 'image',
        //   /* and here's our custom image picker*/
        //   file_picker_callback: function (cb, value, meta) {
        //     var input = document.createElement('input');
        //     input.setAttribute('type', 'file');
        //     input.setAttribute('accept', 'image/*');

            
        //       Note: In modern browsers input[type="file"] is functional without
        //       even adding it to the DOM, but that might not be the case in some older
        //       or quirky browsers like IE, so you might want to add it to the DOM
        //       just in case, and visually hide it. And do not forget do remove it
        //       once you do not need it anymore.
            

        //     input.onchange = function () {
        //       var file = this.files[0];

        //       var reader = new FileReader();
        //       reader.onload = function () {
        //         /*
        //           Note: Now we need to register the blob in TinyMCEs image blob
        //           registry. In the next release this part hopefully won't be
        //           necessary, as we are looking to handle it internally.
        //         */
        //         var id = 'blobid' + (new Date()).getTime();
        //         var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
        //         var base64 = reader.result.split(',')[1];
        //         var blobInfo = blobCache.create(id, file, base64);
        //         blobCache.add(blobInfo);

        //         /* call the callback and populate the Title field with the file name */
        //         cb(blobInfo.blobUri(), { title: file.name });
        //       };
        //       reader.readAsDataURL(file);
        //     };

        //     input.click();
        //   },
        //   content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
      });
    </script>
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
                    Queries from My Domains
                    <small>Interested People Sent Some Queries</small>
                </h2>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <!-- <div class="header">
                            <h2>
                                Add Domain
                            </h2>
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
                        </div> -->
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
                        <div class="body">
                        <div class="panel">
                                            <!-- <div class="panel-heading" role="tab" id="headingTwo_1">
                                                <h4 class="panel-title">
                                                    <a class="collapsed btn btn-primary role="button data-toggle="collapse" data-parent="#accordion_1" href="#collapseTwo_1" aria-expanded="false"
                                                       aria-controls="collapseTwo_1">
                                                        Collapsible Group Item #2
                                                    </a>
                                                </h4>
                                            </div> -->

                                            <div class="collapse" id="collapseExample">
                                                
                                                <div class="panel-body">
                                                    Thank you.... actually currently I'm making some test cases<br>
                                                    Price: <b>$100</b>
                                                    <br>
                                                    <div class="btn-group">
                                                        <button class="btn btn-primary" id="btnSubmit" type="button" data-toggle="collapse" data-target="#collapseForm" aria-expanded="false" aria-controls="collapseForm">
                                                            Reply
                                                          </button>
                                                          <!-- <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="sr-only"></span>
                                                          </button>
                                                          <div class="dropdown-menu">
                                                            <a href="" class="dropdown-item">New</a>
                                                          </div> -->
                                                    </div>
                                                        <div class="collapse" id="collapseForm">
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                    <form method="post" action="{{route('email.save',['did' => $did])}}">
                                                           {{csrf_field()}}
                                                        <div class="formcollapse">
                                                      <div class="form-group">
                                                        <label for="exampleInputEmail1">To</label><br>
                                                        <input type="email" value="fahadhashmi476@gmail.com" name="email_to" data-role="tagsinput" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                                      </div>
                                                      <!-- <div class="form-group">
                                                        <label for="exampleInputPassword1">Receiver Name</label>
                                                            <input value="" type="text" name="namereceiver" class="form-control" id="" placeholder="Enter Receiver Name">
                                                      </div> -->
                                                      <div class="form-group">
                                                        <label for="exampleInputPassword1">Subject</label>
                                                        
                                                            <input value="" type="text" name="email_subject" class="form-control" id="subjectplaceholder" placeholder="Subject" autocomplete="off">
                                                        
                                                        
                                                      </div>
                                                      <div id="autocompleteresultlist"></div>
                                                      <div class="form-group">
                                                                <label>Template</label>
                                                                <!-- <select class="form-control select2" id="selectData">
                                                                     @foreach($email_templates AS $i=>$email_template)
                                                                    <option value="temp{{$email_template->id}}"><a>{{$email_template->template_name}}</a></option>
                                                                    @endforeach
                                                                </select> -->
                                                                <div class="dropdown">
                                                                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select Template
                                                                  <span class="caret"></span></button>
                                                                  <ul class="dropdown-menu">
                                                                    @foreach($email_templates AS $i=>$email_template)
                                                                    <li class="template" data-templateid="{{$email_template->id}}"><a>{{$email_template->template_name}}</a></li>
                                                                    @endforeach
                                                                  </ul>
                                                                  
                                                                </div>
                                                        </div>
                                                      <div class="form-group">
                                                        <label for="exampleInputPassword1">Message</label>
                                                        <div id="tinyeditor">
                                                            <textarea id="mytextarea" name="message">
                                                                
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                    <div id="autocompletetinylist"></div>
                                                    <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" value="1">
                                                    <label class="form-check-label" for="exampleCheck1"> Include quoted text</label>
                                                    </div> 
                                                </div><br>
                                              <!-- <div class="checkbox">
                                                  <label>
                                                    Option one is enabled
                                                    <input type="checkbox" data-toggle="toggle">
                                                  </label>
                                                </div>
                                                <div class="checkbox">
                                                  <label>
                                                    <span>Set a reminder <input type="checkbox" data-toggle="toggle"></span>
                                                  </label>
                                                </div> -->
                                                      <button id="" type="submit" class="btn btn-success">Submit</button>
                                                      <button class="btn btn-danger" id="btncancel" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Cancel</button>
                                                    </form>
                                                      </div> 
                                                      <div class="col-md-2">
                                                        @foreach($placeholders as $placeholder)
                                                            <p style="background-color: #333; color: #fff; padding: 2px;" class="pull-right">{{$placeholder->variable_name}}</p>
                                                        @endforeach
                                                    </div>    
                                                    </div>
                                                    </div>                                                    
                                                    </div>
                                                </div>
                                        </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Domain</th>
                                            <th>Date</th>
                                            <th>Query</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Domain</th>
                                            <th>Date</th>
                                            <th>Query</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($queries AS $i=>$query)
                                        <tr>
                                            <td>{{$i+1}}</td>
                                            <td>
                                                <a style="cursor: pointer;" type="button" id="rowurl" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">{{strtr($query->url, array('https://'=> '', 'http://'=>'', 'www.'=>''))}}
                                                </a>
                                            </td>
                                            <td>{{$query->created_at}}</td>
                                            <td>{!! format_dquery($query->query) !!}</td>
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
    
    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- <script src="../../js/editor.js"></script> -->
    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('css/bootstrap-tagsinput.js') }}"></script>
    <!-- Bootstrap Core Js -->
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
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
<script src="../../plugins/sweetalert/sweetalert.min.js"></script>
    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>

    <script>
        $(document).ready(function(){
            @if(session('success'))
            // showNotification('bg-blue-grey', '{{session("success")}}', 'bottom', 'right', null, null); 
            swal("Done!", "{{session('success')}}", "success");
            @endif
        });
    </script>
    <script>
        $(document).ready(function(){
            $('#subjectplaceholder').keyup(function(){
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
               $("#subjectplaceholder").val(data);
                // alert(data);
              },
              error: function(data) {
                // Stuff
              }
            });
            $("#autocompleteresultlist").fadeOut();
        });
    </script>
    <script>
        // $(document).ready(function(){
        //     $('#mytextarea').keyup(function(){
        //         // alert('alert');
        //         var query = $(this).val();
        //         alert(quer)
        //         if (query!='') {
        //             var _token = $('input[name="_token"]').val();
        //             // alert(_token);
        //             $.ajax({
        //                 url: "{{url('/subject/search')}}",
        //                 method: 'POST',
        //                 data:{query:query , _token:_token},
        //                 success:function(data){
        //                     $("#autocompletetinylist").fadeIn(5);
        //                     $("#autocompletetinylist").html(data);

        //                 }

        //             });

        //         }
        //     });
        // });
        // $(document).on('click','#li',function(){
        //     var id = $(this).data('subjectid');
        //     // alert(id);
        //     $.ajax({
        //       type: "GET",
        //       url: "{{URL('email_subject')}}"+'/'+id,
        //       success: function(data) {
        //        $("#mytextarea").val(data);
        //         // alert(data);
        //       },
        //       error: function(data) {
        //         // Stuff
        //       }
        //     });
        //     $("#autocompletetinylist").fadeOut();
        // });
    </script>
<!-- @include('emails.ourJs'); -->
    <script>
    $(".template").click(function(){
        var id = $(this).data('templateid');
        // alert(id);
        $.ajax({
          type: "GET",
          url: "{{URL('/email_template')}}"+'/'+id,
          success: function(data) {
            tinyMCE.activeEditor.execCommand('mceNewDocument');
            tinyMCE.activeEditor.execCommand('mceInsertContent',false,data);
            // alert(data);
          },
          error: function(data) {
            // Stuff
          }
        });
    });
    </script>
    <script>
        $("#showreply").click(function(){
                $(this).hide();
            });
        
    </script>
    <script type="text/javascript">
      $(document).on('change','#exampleCheck1', function() {
        if ($(this).prop("checked")) {
            // $("#exampleCheck1").prop("disabled", true);
            const Getname = `On Sep 3, 2020 3:47 PM you wrote:> Thank you.... actually currently I am making some test cases`;
             if (Getname != '') {

                // tinymce.EditorManager.execCommand('mceRemoveControl',true, #mytextarea);
                //tinyMCE.activeEditor.setContent(s);   // This is for replace all content
                tinyMCE.activeEditor.execCommand('mceInsertContent',false,Getname); // Append new value where your Cursor
                //console.log(Getname)
            }
            
        }
        else if($(this).prop("checked",false))
                {
                   
                    tinyMCE.activeEditor.execCommand('mceNewDocument');
                   // tinymce.get(Getname).setContent('');
                } 
     });          
    </script>
    <script type="text/javascript">
        $("#rowurl").click(function(){
                var url = $(this).text();
                $('#subjectplaceholder').val(`Re: ${url}`);
            });
    </script>
<script>
    $('.select2').select2();
</script>
</body>
</html>