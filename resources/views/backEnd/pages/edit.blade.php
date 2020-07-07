    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
@extends('backEnd.layouts.master')
@section('title','Edit Category')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('pages.index')}}">Pages</a> <a href="#" class="current">Edit Page</a> </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Edit Page</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="{{route('pages.update',$edit_page->id)}}" name="basic_validate" id="basic_validate" novalidate="novalidate"  enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            {{method_field("PUT")}}
                            <div class="control-group{{$errors->has('page')?' has-error':''}}">
                                <label class="control-label">Page Name :</label>
                                <div class="controls">
                                    <input type="text" name="page" id="page" value="{{$edit_page->page}}" required readonly="">
                                    <span class="text-danger" style="color: red;">{{$errors->first('page')}}</span>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Description :</label>
                                <div class="controls">
                                    <textarea id="summernote" name="description">{{$edit_page->description}}</textarea>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Banner upload</label>
                                <div class="controls">
                                    <input type="file" name="image" id="image"/>
                                    <span class="text-danger">{{$errors->first('image')}}</span>
                                    @if($edit_page->image!='')
                                        &nbsp;&nbsp;&nbsp;
                                        <a href="javascript:" rel="{{$edit_page->id}}" rel1="delete-pageimage" class="btn btn-danger btn-mini deleteRecord">Delete Old Image</a>
                                        <img src="{{url('public/page/small/',$edit_page->image)}}" width="35" alt="">
                                    @endif
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Enable :</label>
                                <div class="controls">
                                    <input type="checkbox" name="status" id="status" value="1" {{($edit_page->status==0)?'':'checked'}}>
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="control-label"></label>
                                <div class="controls">
                                    <input type="submit" value="Update" class="btn btn-success">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

            <script>



          $('#summernote').summernote({



            height: 300,
            width: 580



          });



        </script>
        
@endsection
@section('jsblock')
    <script src="{{asset('public/js/jquery.min.js')}}"></script>
    <script src="{{asset('public/js/jquery.ui.custom.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/js/bootstrap-colorpicker.js')}}"></script>
    <script src="{{asset('public/js/jquery.toggle.buttons.js')}}"></script>
    <script src="{{asset('public/js/masked.js')}}"></script>
    <script src="{{asset('public/js/jquery.uniform.js')}}"></script>
    <script src="{{asset('public/js/select2.min.js')}}"></script>
    <script src="{{asset('public/js/matrix.js')}}"></script>
    <script src="{{asset('public/js/matrix.form_common.js')}}"></script>
    <script src="{{asset('public/js/wysihtml5-0.3.0.js')}}"></script>
    <script src="{{asset('public/js/jquery.peity.min.js')}}"></script>
    <script src="{{asset('public/js/bootstrap-wysihtml5.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

        <script>
        $(".deleteRecord").click(function () {
            var id=$(this).attr('rel');
            var deleteFunction=$(this).attr('rel1');
            swal({
                title:'Are you sure?',
                text:"You won't be able to revert this!",
                type:'warning',
                showCancelButton:true,
                confirmButtonColor:'#3085d6',
                cancelButtonColor:'#d33',
                confirmButtonText:'Yes, delete it!',
                cancelButtonText:'No, cancel!',
                confirmButtonClass:'btn btn-success',
                cancelButtonClass:'btn btn-danger',
                buttonsStyling:false,
                reverseButtons:true
            },function () {
                window.location.href="../../../admin/"+deleteFunction+"/"+id;
            });
        });
        $('.textarea_editor').wysihtml5();
    </script>
@endsection