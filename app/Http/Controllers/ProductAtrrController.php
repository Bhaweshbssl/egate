<?php

namespace App\Http\Controllers;

use App\ProductAtrr_model;
use App\Products_model;
use Illuminate\Http\Request;

class ProductAtrrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'sku'=>'required',
            'size'=>'required',
            'price'=>'required|numeric',
            'stock'=>'required|numeric'
        ]);
        ProductAtrr_model::create($request->all());
        return back()->with('message','Product Attributes added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu_active =3;
        $attributes=ProductAtrr_model::where('products_id',$id)->get();
        $product=Products_model::findOrFail($id);
        return view('backEnd.products.add_pro_atrr',compact('menu_active','product','attributes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request_data=$request->all();
        foreach ($request_data['id'] as $key=>$attr){
            $update_attr=ProductAtrr_model::where([['products_id',$id],['id',$request_data['id'][$key]]])
                ->update(['sku'=>$request_data['sku'][$key],
                    'size'=>$request_data['size'][$key],
                    'price'=>$request_data['price'][$key],
                    'ean'=>$request_data['ean'][$key],
                    'projector_type'=>$request_data['projector_type'][$key],
                    'light_source'=>$request_data['light_source'][$key],
                    'design'=>$request_data['design'][$key],
                    'brightness'=>$request_data['brightness'][$key],
                    'ansi'=>$request_data['ansi'][$key],
                    'resolution_native'=>$request_data['resolution_native'][$key],
                    'resolution_support'=>$request_data['resolution_support'][$key],
                    'video_compatibility'=>$request_data['video_compatibility'][$key],
                    'aspect_ratio'=>$request_data['aspect_ratio'][$key],
                    'contrast_ratio'=>$request_data['contrast_ratio'][$key],
                    'throw_ratio'=>$request_data['throw_ratio'][$key],
                    'digital_zoom'=>$request_data['digital_zoom'][$key],
                    'keys_tone'=>$request_data['keys_tone'][$key],
                    'voltage'=>$request_data['voltage'][$key],
                    'power'=>$request_data['power'][$key],
                    'cpu'=>$request_data['cpu'][$key],
                    'os'=>$request_data['os'][$key],
                    'dim_effect'=>$request_data['dim_effect'][$key],
                    'power_backup'=>$request_data['power_backup'][$key],
                    'vga'=>$request_data['vga'][$key],
                    'audio_out'=>$request_data['audio_out'][$key],
                    'av'=>$request_data['av'][$key],
                    'hdmi'=>$request_data['hdmi'][$key],
                    'sd'=>$request_data['sd'][$key],
                    'usb'=>$request_data['usb'][$key],
                    'wireless_display'=>$request_data['wireless_display'][$key],
                    'wifi'=>$request_data['wifi'][$key],
                    'bluetooth'=>$request_data['bluetooth'][$key],
                    'speaker'=>$request_data['speaker'][$key],
                    'dimension'=>$request_data['dimension'][$key],
                    'weight'=>$request_data['weight'][$key],
                    'weight_box'=>$request_data['weight_box'][$key],
                    'dimension_product'=>$request_data['dimension_product'][$key],
                    'note'=>$request_data['note'][$key]
                ]);
        }
        return back()->with('message','Product Attributes updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function deleteAttr($id){
        $deleteAttr=ProductAtrr_model::findOrFail($id);
        $deleteAttr->delete();
        return back()->with('message','Product Attributes deleted Successfully!');
    }
}
