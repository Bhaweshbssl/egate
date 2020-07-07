@extends('backEnd.layouts.master')
@section('title','Add Attribute')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('product.index')}}">Products</a> <a href="#" class="current">Add Attribute</a> </div>
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Well done! &nbsp;</strong>{{Session::get('message')}}
            </div>
        @endif
            <div class="row-fluid">
                <div class="span6">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-file"></i> </span>
                            <h5>Product : {{$product->p_name}}</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <ul class="recent-posts">
                                <li>
                                    <div class="user-thumb"> <img width="40" height="40" alt="User" src="{{url('public/products/small',$product->image)}}"> </div>
                                    <div class="article-post">
                                        <span class="user-info">Product Code : <b>{{$product->p_code}}</b></span>
                                        <p>Product Brand : <b>{{$product->p_color}}</b></p>
                                    </div>
                                </li>
                                <li>
                                    <form action="{{route('product_attr.store')}}" method="post" role="form">
                                        <legend>Add Attribute</legend>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="form-group">
                                            <input type="hidden" name="products_id" value="{{$product->id}}">
                                            <input type="text" class="form-control" name="sku" value="{{old('sku')}}" id="sku" placeholder="Item Part/Sku No" required>
                                            <input type="text" class="form-control" name="size" value="{{old('size')}}" id="size" placeholder="Projection Size" required>
                                            <input type="text" class="form-control" name="price" value="{{old('price')}}" id="price" placeholder="Selling Price" required>
                                            <span style="color: red;">{{$errors->first('price')}}</span>
                                            <input type="number" class="form-control" name="stock" value="{{old('stock')}}" id="stock" placeholder="Stock Available" required>
                                            <input type="text" class="form-control" name="ean" value="{{old('ean')}}" id="ean" placeholder="EAN">
                                            <input type="text" class="form-control" name="projector_type" value="{{old('projector_type')}}" id="projector_type" placeholder="Projector Type">
                                            <input type="text" class="form-control" name="light_source" value="{{old('light_source')}}" id="light_source" placeholder="Light Source">
                                            <input type="text" class="form-control" name="design" value="{{old('design')}}" id="design" placeholder="Design">
                                            <input type="text" class="form-control" name="brightness" value="{{old('brightness')}}" id="brightness" placeholder="Brightness">
                                            <input type="text" class="form-control" name="ansi" value="{{old('ansi')}}" id="ansi" placeholder="ANSI (less than)">
                                            <input type="text" class="form-control" name="resolution_native" value="{{old('resolution_native')}}" id="resolution_native" placeholder="Resolution ( Native )">
                                            <input type="text" class="form-control" name="resolution_support" value="{{old('resolution_support')}}" id="resolution_support" placeholder="Resolution Support">
                                            <input type="text" class="form-control" name="video_compatibility" value="{{old('video_compatibility')}}" id="video_compatibility" placeholder="Video Compatibility">
                                            <input type="text" class="form-control" name="aspect_ratio" value="{{old('aspect_ratio')}}" id="aspect_ratio" placeholder="Aspect Ratio">
                                            <input type="text" class="form-control" name="contrast_ratio" value="{{old('contrast_ratio')}}" id="contrast_ratio" placeholder="Contrast Ratio">
                                            <input type="text" class="form-control" name="throw_ratio" value="{{old('throw_ratio')}}" id="throw_ratio" placeholder="Throw Ratio">
                                            <input type="text" class="form-control" name="digital_zoom" value="{{old('digital_zoom')}}" id="digital_zoom" placeholder="Digital Zoom">
                                            <input type="text" class="form-control" name="keys_tone" value="{{old('keys_tone')}}" id="keys_tone" placeholder="Keys Tone">
                                            <input type="text" class="form-control" name="voltage" value="{{old('voltage')}}" id="voltage" placeholder="Voltage / FrQ">
                                            <input type="text" class="form-control" name="power" value="{{old('power')}}" id="power" placeholder="Power">
                                            <input type="text" class="form-control" name="cpu" value="{{old('cpu')}}" id="cpu" placeholder="CPU/GPU/RAM/ROM">
                                            <input type="text" class="form-control" name="os" value="{{old('os')}}" id="os" placeholder="OS">
                                            <input type="text" class="form-control" name="3d" value="{{old('3d')}}" id="3d" placeholder="3D">
                                            <input type="text" class="form-control" name="power_backup" value="{{old('power_backup')}}" id="power_backup" placeholder="Power Backup">
                                            <input type="text" class="form-control" name="vga" value="{{old('vga')}}" id="vga" placeholder="VGA RGB">
                                            <input type="text" class="form-control" name="audio_out" value="{{old('audio_out')}}" id="audio_out" placeholder="Audio Out">
                                            <input type="text" class="form-control" name="av" value="{{old('av')}}" id="av" placeholder="AV (3.5mm/RCA)">
                                            <input type="text" class="form-control" name="hdmi" value="{{old('hdmi')}}" id="hdmi" placeholder="HDMI">
                                            <input type="text" class="form-control" name="sd" value="{{old('sd')}}" id="sd" placeholder="SD/mSD Slot">
                                            <input type="text" class="form-control" name="usb" value="{{old('usb')}}" id="usb" placeholder="USB">
                                            <input type="text" class="form-control" name="wireless_display" value="{{old('wireless_display')}}" id="wireless_display" placeholder="Wireless Display">
                                            <input type="text" class="form-control" name="wifi" value="{{old('wifi')}}" id="wifi" placeholder="WIFI">
                                            <input type="text" class="form-control" name="bluetooth" value="{{old('bluetooth')}}" id="bluetooth" placeholder="Bluetooth">
                                            <input type="text" class="form-control" name="speaker" value="{{old('speaker')}}" id="speaker" placeholder="Speaker">
                                            <input type="text" class="form-control" name="dimension" value="{{old('dimension')}}" id="dimension" placeholder="Dim. (mm) Box">
                                            <input type="text" class="form-control" name="weight" value="{{old('weight')}}" id="weight" placeholder="Weight (w/o Box)">
                                            <input type="text" class="form-control" name="weight_box" value="{{old('weight_box')}}" id="weight_box" placeholder="Weight (with Box)">
                                            <input type="text" class="form-control" name="dimension_product" value="{{old('dimension_product')}}" id="dimension_product" placeholder="Dim. (mm) Prod.">
                                            <textarea class="textarea_editor span12" name="note" id="note" rows="6" placeholder="Note" style="width: 442px;">{{old('note')}}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success">Add</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
                            <h5>List Products Attribute</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="{{route('product_attr.update',$product->id)}}" method="post" role="form">
                                {{method_field("PUT")}}
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <table class="table table-striped table-bordered">
                                <tbody>
                                @foreach($attributes as $attribute)
                                    <input type="hidden" name="id[]" value="{{$attribute->id}}">
                                <tr>
                                    <th>SKU</th>
                                    <td class="taskStatus">
                                        <input type="text" name="sku[]" id="sku" class="form-control" value="{{$attribute->sku}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Size</th>
                                    <td class="taskStatus">
                                        <input type="text" name="size[]" id="size" class="form-control" value="{{$attribute->size}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Stock</th>
                                    <td class="taskOptions">
                                        <input type="text" name="stock[]" id="stock" class="form-control" value="{{$attribute->stock}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td class="taskOptions">
                                        <input type="text" name="price[]" id="price" class="form-control" value="{{$attribute->price}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>EAN</th>
                                    <td class="taskOptions">
                                        <input type="text" name="ean[]" id="ean" class="form-control" value="{{$attribute->ean}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>projector_type</th>
                                    <td class="taskOptions">
                                        <input type="text" name="projector_type[]" id="projector_type" class="form-control" value="{{$attribute->projector_type}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                    <th>light_source</th>
                                    <td class="taskOptions">
                                        <input type="text" name="light_source[]" id="light_source" class="form-control" value="{{$attribute->light_source}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>design</th>
                                    <td class="taskOptions">
                                        <input type="text" name="design[]" id="design" class="form-control" value="{{$attribute->design}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>brightness</th>
                                    <td class="taskOptions">
                                        <input type="text" name="brightness[]" id="brightness" class="form-control" value="{{$attribute->brightness}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>ansi</th>
                                    <td class="taskOptions">
                                        <input type="text" name="ansi[]" id="ansi" class="form-control" value="{{$attribute->ansi}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>resolution_native</th>
                                    <td class="taskOptions">
                                        <input type="text" name="resolution_native[]" id="resolution_native" class="form-control" value="{{$attribute->resolution_native}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>resolution_support</th>
                                    <td class="taskOptions">
                                        <input type="text" name="resolution_support[]" id="resolution_support" class="form-control" value="{{$attribute->resolution_support}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>video_compatibility</th>
                                    <td class="taskOptions">
                                        <input type="text" name="video_compatibility[]" id="video_compatibility" class="form-control" value="{{$attribute->video_compatibility}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>aspect_ratio</th>
                                    <td class="taskOptions">
                                        <input type="text" name="aspect_ratio[]" id="aspect_ratio" class="form-control" value="{{$attribute->aspect_ratio}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>contrast_ratio</th>
                                    <td class="taskOptions">
                                        <input type="text" name="contrast_ratio[]" id="contrast_ratio" class="form-control" value="{{$attribute->contrast_ratio}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>throw_ratio</th>
                                    <td class="taskOptions">
                                        <input type="text" name="throw_ratio[]" id="throw_ratio" class="form-control" value="{{$attribute->throw_ratio}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>digital_zoom</th>
                                    <td class="taskOptions">
                                        <input type="text" name="digital_zoom[]" id="digital_zoom" class="form-control" value="{{$attribute->digital_zoom}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>keys_tone</th>
                                    <td class="taskOptions">
                                        <input type="text" name="keys_tone[]" id="keys_tone" class="form-control" value="{{$attribute->keys_tone}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>voltage</th>
                                    <td class="taskOptions">
                                        <input type="text" name="voltage[]" id="voltage" class="form-control" value="{{$attribute->voltage}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>power</th>
                                    <td class="taskOptions">
                                        <input type="text" name="power[]" id="power" class="form-control" value="{{$attribute->power}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>cpu</th>
                                    <td class="taskOptions">
                                        <input type="text" name="cpu[]" id="cpu" class="form-control" value="{{$attribute->cpu}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>os</th>
                                    <td class="taskOptions">
                                        <input type="text" name="os[]" id="os" class="form-control" value="{{$attribute->os}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>dim_effect</th>
                                    <td class="taskOptions">
                                        <input type="text" name="dim_effect[]" id="dim_effect" class="form-control" value="{{$attribute->dim_effect}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>power_backup</th>
                                    <td class="taskOptions">
                                        <input type="text" name="power_backup[]" id="power_backup" class="form-control" value="{{$attribute->power_backup}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>vga</th>
                                    <td class="taskOptions">
                                        <input type="text" name="vga[]" id="vga" class="form-control" value="{{$attribute->vga}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>audio_out</th>
                                    <td class="taskOptions">
                                        <input type="text" name="audio_out[]" id="audio_out" class="form-control" value="{{$attribute->audio_out}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>av</th>
                                    <td class="taskOptions">
                                        <input type="text" name="av[]" id="av" class="form-control" value="{{$attribute->av}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>hdmi</th>
                                    <td class="taskOptions">
                                        <input type="text" name="hdmi[]" id="hdmi" class="form-control" value="{{$attribute->hdmi}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>sd</th>
                                    <td class="taskOptions">
                                        <input type="text" name="sd[]" id="sd" class="form-control" value="{{$attribute->sd}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>usb</th>
                                    <td class="taskOptions">
                                        <input type="text" name="usb[]" id="usb" class="form-control" value="{{$attribute->usb}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>wireless_display</th>
                                    <td class="taskOptions">
                                        <input type="text" name="wireless_display[]" id="wireless_display" class="form-control" value="{{$attribute->wireless_display}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>wifi</th>
                                    <td class="taskOptions">
                                        <input type="text" name="wifi[]" id="wifi" class="form-control" value="{{$attribute->wifi}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>bluetooth</th>
                                    <td class="taskOptions">
                                        <input type="text" name="bluetooth[]" id="bluetooth" class="form-control" value="{{$attribute->bluetooth}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>speaker</th>
                                    <td class="taskOptions">
                                        <input type="text" name="speaker[]" id="speaker" class="form-control" value="{{$attribute->speaker}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>dimension</th>
                                    <td class="taskOptions">
                                        <input type="text" name="dimension[]" id="dimension" class="form-control" value="{{$attribute->dimension}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>weight</th>
                                    <td class="taskOptions">
                                        <input type="text" name="weight[]" id="weight" class="form-control" value="{{$attribute->weight}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>weight_box</th>
                                    <td class="taskOptions">
                                        <input type="text" name="weight_box[]" id="weight_box" class="form-control" value="{{$attribute->weight_box}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>dimension_product</th>
                                    <td class="taskOptions">
                                        <input type="text" name="dimension_product[]" id="dimension_product" class="form-control" value="{{$attribute->dimension_product}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>
                                <tr>
                                     <th>note</th>
                                    <td class="taskOptions">
                                        <input type="text" name="note[]" id="note" class="form-control" value="{{$attribute->note}}" required="required" style="width: 90%;">
                                    </td>
                                </tr>                                
                                <tr>
                                    <th>Action</th>
                                    <td style="text-align: center; ">
                                        <button type="submit" class="btn btn-success btn-mini">Update</button>
                                        <a href="javascript:" rel="{{$attribute->id}}" rel1="delete-attribute" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
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
                window.location.href="../../admin/"+deleteFunction+"/"+id;
            });
        });
    </script>
@endsection