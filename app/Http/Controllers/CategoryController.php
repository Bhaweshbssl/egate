<?php

namespace App\Http\Controllers;

use App\Category_model;
use foo\bar;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_active=0;
        $categories=Category_model::all();
        return view('backEnd.category.index',compact('menu_active','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu_active=2;
        $plucked=Category_model::where('parent_id',0)->pluck('name','id');
        $cate_levels=['0'=>'Main Category']+$plucked->all();
        return view('backEnd.category.create',compact('menu_active','cate_levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkCateName(Request $request){
        $data=$request->all();
        $category_name=$data['name'];
        $ch_cate_name_atDB=Category_model::select('name')->where('name',$category_name)->first();
        if($category_name==$ch_cate_name_atDB['name']){
            echo "true"; die();
        }else {
            echo "false"; die();
        }
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:255|unique:categories,name',
            'image'=>'required|image|mimes:png,jpg,jpeg|max:1000',
            'banner'=>'required|image|mimes:png,jpg,jpeg,gif|max:2000',
        ]);
        $data=$request->all();
        if($request->file('image')){
            $image=$request->file('image');
            if($image->isValid()){
                $fileName=time().'-'.str_slug($data['name'],"-").'.'.$image->getClientOriginalExtension();
                $large_image_path=public_path('category/large/'.$fileName);
                $medium_image_path=public_path('category/medium/'.$fileName);
                $small_image_path=public_path('category/small/'.$fileName);
                //Resize Image
                Image::make($image)->save($large_image_path);
                Image::make($image)->resize(600,600)->save($medium_image_path);
                Image::make($image)->resize(300,300)->save($small_image_path);
                $data['image']=$fileName;
            }
        }
        if($request->file('banner')){
            $banner=$request->file('banner');
            if($banner->isValid()){
                $fileName=time().'-'.str_slug($data['name'],"-").'.'.$banner->getClientOriginalExtension();
                $large_image_path=public_path('category/large/'.$fileName);
                $medium_image_path=public_path('category/medium/'.$fileName);
                $small_image_path=public_path('category/small/'.$fileName);
                //Resize Image
                Image::make($banner)->save($large_image_path);
                Image::make($banner)->resize(600,600)->save($medium_image_path);
                Image::make($banner)->resize(300,300)->save($small_image_path);
                $data['banner']=$fileName;
            }
        }
        Category_model::create($data);
        return redirect()->route('category.index')->with('message','Category added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu_active=0;
        $plucked=Category_model::where('parent_id',0)->pluck('name','id');
        $cate_levels=['0'=>'Main Category']+$plucked->all();
        $edit_category=Category_model::findOrFail($id);
        return view('backEnd.category.edit',compact('edit_category','menu_active','cate_levels'));
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
        $update_categories=Category_model::findOrFail($id);
        $this->validate($request,[
            'name'=>'required|max:255|unique:categories,name,'.$update_categories->id,
            'image'=>'image|mimes:png,jpg,jpeg|max:1000',
            'banner'=>'image|mimes:png,jpg,jpeg|max:2000',
        ]);
        //dd($request->all());die();
        $input_data=$request->all();
        if($update_categories['image']==''){
            if($request->file('image')){
                $image=$request->file('image');
                if($image->isValid()){
                    $fileName=time().'-'.str_slug($input_data['name'],"-").'.'.$image->getClientOriginalExtension();
                    $large_image_path=public_path('category/large/'.$fileName);
                    $medium_image_path=public_path('category/medium/'.$fileName);
                    $small_image_path=public_path('category/small/'.$fileName);
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
        if($update_categories['banner']==''){
            if($request->file('banner')){
                $banner=$request->file('banner');
                if($banner->isValid()){
                    $fileName=time().'-'.str_slug($input_data['name'],"-").'.'.$banner->getClientOriginalExtension();
                    $large_image_path=public_path('category/large/'.$fileName);
                    $medium_image_path=public_path('category/medium/'.$fileName);
                    $small_image_path=public_path('category/small/'.$fileName);
                    //Resize Image
                    Image::make($banner)->save($large_image_path);
                    Image::make($banner)->resize(600,600)->save($medium_image_path);
                    Image::make($banner)->resize(300,300)->save($small_image_path);
                    $input_data['banner']=$fileName;
                }
            }
        }else{
            $input_data['banner']=$update_categories['banner'];
        }
        if(empty($input_data['status'])){
            $input_data['status']=0;
        }
        $update_categories->update($input_data);
        return redirect()->route('category.index')->with('message','Category updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=Category_model::findOrFail($id);
        $image_large=public_path().'/category/large/'.$delete->image;
        $image_medium=public_path().'/category/medium/'.$delete->image;
        $image_small=public_path().'/category/small/'.$delete->image;
        if($delete->delete()){
            unlink($image_large);
            unlink($image_medium);
            unlink($image_small);
        }
        return redirect()->route('category.index')->with('message','Category deleted Successfully!');
    }

    public function deleteImage($id){
        $delete_image=Category_model::findOrFail($id);
        $image_large=public_path().'/category/large/'.$delete_image->image;
        $image_medium=public_path().'/category/medium/'.$delete_image->image;
        $image_small=public_path().'/category/small/'.$delete_image->image;
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

    public function deleteBanner($id){
        $delete_image=Category_model::findOrFail($id);
        $image_large=public_path().'/category/large/'.$delete_image->banner;
        $image_medium=public_path().'/category/medium/'.$delete_image->banner;
        $image_small=public_path().'/category/small/'.$delete_image->banner;
        if($delete_image){
            $delete_image->banner='';
            $delete_image->save();
            ////// delete image ///
            unlink($image_large);
            unlink($image_medium);
            unlink($image_small);
        }
        return back();
    }
}
