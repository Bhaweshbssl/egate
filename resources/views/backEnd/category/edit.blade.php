@extends('backEnd.layouts.master')
@section('title','Edit Category')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('category.index')}}">Categories</a> <a href="#" class="current">Edit Category</a> </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Edit Category</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="{{route('category.update',$edit_category->id)}}" name="basic_validate" id="basic_validate" novalidate="novalidate"  enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            {{method_field("PUT")}}
                            <div class="control-group{{$errors->has('name')?' has-error':''}}">
                                <label class="control-label">Category Name :</label>
                                <div class="controls">
                                    <input type="text" name="name" id="name" value="{{$edit_category->name}}" required>
                                    <span class="text-danger" style="color: red;">{{$errors->first('name')}}</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Category Lavel :</label>
                                <div class="controls" style="width: 245px;">
                                    <select name="parent_id" id="parent_id">
                                        {{--@foreach($cate_levels as $key=>$value)
                                            <option value="{{$key}}" {{($edit_category->parent_id==$key)?' selected':''}}>{{$value}}</option>
                                        @endforeach--}}

                                        @foreach($cate_levels as $key=>$value)
                                            <option value="{{$key}}"{{($edit_category->parent_id==$key)?' selected':''}}>{{$value}}</option>
                                            <?php
                                            if($key!=0){
                                                $subCategory=DB::table('categories')->select('id','name')->where('parent_id',$key)->get();
                                                if(count($subCategory)>0){
                                                    foreach ($subCategory as $subCate){
                                                        echo '<option value="'.$subCate->id.'">&nbsp;&nbsp;--'.$subCate->name.'</option>';
                                                    }
                                                }
                                            }
                                            ?>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Description :</label>
                                <div class="controls">
                                    <textarea name="description" id="description" rows="3">{{$edit_category->description}}</textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Image upload</label>
                                <div class="controls">
                                    <input type="file" name="image" id="image"/>
                                    <span class="text-danger">{{$errors->first('image')}}</span>
                                    @if($edit_category->image!='')
                                        &nbsp;&nbsp;&nbsp;
                                        <a href="javascript:" rel="{{$edit_category->id}}" rel1="delete-catimage" class="btn btn-danger btn-mini deleteRecord">Delete Old Image</a>
                                        <img src="{{url('public/category/small/',$edit_category->image)}}" width="35" alt="">
                                    @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Banner upload</label>
                                <div class="controls">
                                    <input type="file" name="banner" id="banner"/>
                                    <span class="text-danger">{{$errors->first('banner')}}</span>
                                    @if($edit_category->banner!='')
                                        &nbsp;&nbsp;&nbsp;
                                        <a href="javascript:" rel="{{$edit_category->id}}" rel1="delete-catbanner" class="btn btn-danger btn-mini deletecatRecord">Delete Old Banner</a>
                                        <img src="{{url('public/category/small/',$edit_category->banner)}}" width="35" alt="">
                                    @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Enable :</label>
                                <div class="controls">
                                    <input type="checkbox" name="status" id="status" value="1" {{($edit_category->status==0)?'':'checked'}}>
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

        <script>
        $(".deletecatRecord").click(function () {
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