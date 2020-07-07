<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Http\Request;
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_active=7;
        $i=0;
        $products=Page::orderBy('created_at','desc')->get();
        return view('backEnd.pages.index',compact('menu_active','products','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu_active=7;
        return view('backEnd.pages.create',compact('menu_active'));
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
        	'page'=>'required'
        ]);
        $formInput=$request->all();
        if($request->file('image')){
            $image=$request->file('image');
            if($image->isValid()){
                $fileName=time().'-'.str_slug($formInput['page'],"-").'.'.$image->getClientOriginalExtension();
                $large_image_path=public_path('page/large/'.$fileName);
                $medium_image_path=public_path('page/medium/'.$fileName);
                $small_image_path=public_path('page/small/'.$fileName);
                //Resize Image
                Image::make($image)->save($large_image_path);
                Image::make($image)->resize(600,600)->save($medium_image_path);
                Image::make($image)->resize(300,300)->save($small_image_path);
                $formInput['image']=$fileName;
            }
        }
        Page::create($formInput);
        return redirect()->route('pages.index')->with('message','Page added Successfully!');
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu_active=7;
        $edit_page=Page::findOrFail($id);
        return view('backEnd.pages.edit',compact('edit_page','menu_active'));
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
        $update_categories=Page::findOrFail($id);
        $this->validate($request,[
            'page'=>'required'
        ]);
        //dd($request->all());die();
        $input_data=$request->all();
        if($update_categories['image']==''){
            if($request->file('image')){
                $image=$request->file('image');
                if($image->isValid()){
                    $fileName=time().'-'.str_slug($input_data['page'],"-").'.'.$image->getClientOriginalExtension();
                    $large_image_path=public_path('page/large/'.$fileName);
                    $medium_image_path=public_path('page/medium/'.$fileName);
                    $small_image_path=public_path('page/small/'.$fileName);
                    //Resize Image
                    Image::make($image)->save($large_image_path);
                    Image::make($image)->resize(600,600)->save($medium_image_path);
                    Image::make($image)->resize(300,300)->save($small_image_path);
                    $input_data['image']=$fileName;
                }
            }
        }else{
            $input_data['image']=$update_categories['image'];
        }
        if(empty($input_data['status'])){
            $input_data['status']=0;
        }
        $update_categories->update($input_data);
        return redirect()->route('pages.index')->with('message','Page updated Successfully!');
    }

    public function deleteImage($id){
        $delete_image=Page::findOrFail($id);
        $image_large=public_path().'/page/large/'.$delete_image->image;
        $image_medium=public_path().'/page/medium/'.$delete_image->image;
        $image_small=public_path().'/page/small/'.$delete_image->image;
        if($delete_image){
            $delete_image->image='';
            $delete_image->save();
            ////// delete image ///
            unlink($image_large);
            unlink($image_medium);
            unlink($image_small);
        }
        return back();
    }
}
