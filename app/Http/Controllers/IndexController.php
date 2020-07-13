<?php

namespace App\Http\Controllers;

use App\Category_model;
use App\Review;
use App\ImageGallery_model;
use App\ProductAtrr_model;
use App\Products_model;
use App\Contact;
use Mail;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        $products=Products_model::where('p_type', 'standard')->get();
        $featured=Products_model::orderBy('created_at','asc')->where('p_type', 'featured')->get();
        $series=Category_model::where('parent_id', '39')->limit(4)->get();
        $productsattr=ProductAtrr_model::get();
        return view('frontEnd.index',compact('products','featured','series','productsattr'));
    }
    public function shop(){
        $products=Products_model::orderBy('created_at','asc')->paginate(8);
        $byCate="";
        $series=Category_model::where('parent_id', '39')->limit(4)->get();
        $productsattr=ProductAtrr_model::get();
        return view('frontEnd.products-list',compact('products','byCate','series','productsattr'));
    }
    public function shopaz(){
        $products=Products_model::orderBy('p_name','asc')->paginate(8);
        $byCate="";
        $series=Category_model::where('parent_id', '39')->limit(4)->get();
        $productsattr=ProductAtrr_model::get();
        return view('frontEnd.productsaz',compact('products','byCate','series','productsattr'));
    }
    public function shopza(){
        $products=Products_model::orderBy('p_name','desc')->paginate(8);
        $byCate="";
        $series=Category_model::where('parent_id', '39')->limit(4)->get();
        $productsattr=ProductAtrr_model::get();
        return view('frontEnd.productsza',compact('products','byCate','series','productsattr'));
    }
    public function shopplh(){
        $products=Products_model::orderBy('price','asc')->paginate(8);
        $byCate="";
        $series=Category_model::where('parent_id', '39')->limit(4)->get();
        $productsattr=ProductAtrr_model::get();
        return view('frontEnd.productsplh',compact('products','byCate','series','productsattr'));
    }
    public function shopphl(){
        $products=Products_model::orderBy('price','desc')->paginate(8);
        $byCate="";
        $series=Category_model::where('parent_id', '39')->limit(4)->get();
        $productsattr=ProductAtrr_model::get();
        return view('frontEnd.productsphl',compact('products','byCate','series','productsattr'));
    }
    public function listByCat($id){
        $list_product=Products_model::orderBy('id','asc')->where('categories_id',$id)->paginate(8);
        $byCate=Category_model::select('name')->where('id',$id)->first();
        $series=Category_model::where('parent_id', '39')->limit(4)->get();
        $productsattr=ProductAtrr_model::get();
        return view('frontEnd.products',compact('list_product','byCate','series','productsattr'));
    }
    public function detialpro($id){
        $detail_product=Products_model::findOrFail($id);
        $imagesGalleries=ImageGallery_model::where('products_id',$id)->get();
        $totalStock=ProductAtrr_model::where('products_id',$id)->sum('stock');
        $relateProducts=Products_model::where([['id','!=',$id],['categories_id',$detail_product->categories_id]])->get();
        $reviews=Review::orderBy('created_at','desc')->where('product_id',$id)->get();
        $totalReview = DB::table('reviews')->where('product_id',$id)->count();
        $products=Products_model::orderBy('created_at','desc')->where('id','!=',$id)->get();
        $byCate="";
        $productsattr=ProductAtrr_model::orderBy('created_at','desc')->get();
        return view('frontEnd.product_details',compact('detail_product','imagesGalleries','totalStock','relateProducts','reviews', 'totalReview','products','byCate','productsattr'));
    }
    public function getAttrs(Request $request){
        $all_attrs=$request->all();
        //print_r($all_attrs);die();
        $attr=explode('-',$all_attrs['size']);
        //echo $attr[0].' <=> '. $attr[1];
        $result_select=ProductAtrr_model::where(['products_id'=>$attr[0],'size'=>$attr[1]])->first();
        echo $result_select->price."#".$result_select->stock;
    }

    public function about(){
        $about_page=Page::orderBy('created_at','asc')->where('id', '2')->get();
        return view('frontEnd.about',compact('about_page'));
    }

    public function team(){
        $team_page=Page::orderBy('created_at','asc')->where('id', '3')->get();
        return view('frontEnd.team',compact('team_page'));
    }

    public function advantage(){
        $content=Page::orderBy('created_at','asc')->where('id', '4')->get();
        return view('frontEnd.advantage',compact('content'));
    }

    public function faq(){
        $content=Page::orderBy('created_at','asc')->where('id', '5')->get();
        return view('frontEnd.faq',compact('content'));
    }

    public function whyegate(){
        return view('frontEnd.whyegate');
    }

    public function screen(){
        $content=Page::orderBy('created_at','asc')->where('id', '6')->get();
        return view('frontEnd.screen',compact('content'));
    }

    public function downloads(){
        $content=Page::orderBy('created_at','asc')->where('id', '7')->get();
        return view('frontEnd.downloads',compact('content'));
    }

    public function accessories(){
        $content=Page::orderBy('created_at','asc')->where('id', '8')->get();
        return view('frontEnd.accessories',compact('content'));
    }

    public function elearning(){
        $content=Page::orderBy('created_at','asc')->where('id', '9')->get();
        return view('frontEnd.elearning',compact('content'));
    }

    public function career(){
        $content=Page::orderBy('created_at','asc')->where('id', '10')->get();
        return view('frontEnd.career',compact('content'));
    }

    public function support(){
        $content=Page::orderBy('created_at','asc')->where('id', '11')->get();
        return view('frontEnd.support',compact('content'));
    }

    public function contact(){
        return view('frontEnd.contact');
    }

    public function indexsearch(Request $request) 
    {
        //$userId = Auth::user()->id;
        $todayDate = date("Y-m-d");
        $searchTerm = $request->input('searchTerm');
        $posts = Products_model::search($searchTerm)->orderBy('created_at', 'desc')->paginate(8); 
        $series=Category_model::where('parent_id', '39')->limit(4)->get();
        $products=Products_model::orderBy('created_at','desc')->get();
        $byCate="";
        $productsattr=ProductAtrr_model::orderBy('created_at','desc')->get();
        return view('frontEnd.result', compact('posts', 'searchTerm','series','products','byCate','productsattr'))->with([
             'title'=>'Result'
         ]);
    }

    public function privacy(){
        return view('frontEnd.privacy');
    }

    public function terms(){
        return view('frontEnd.terms');
    }

    public function contactform(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'messages'=>'required',
        ]);
        $input_data=$request->all();
        if($input_data)
            {
                $data = array(
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'messages' => $request->input('messages'),
                );
                
                Mail::send('mail.thankyou', $data, function ($message) use ($data) {
                    $message->to($data['email'])->subject('Enquiry');
                    $message->from('bsslbhawesh@gmail.com', 'EGATE');
                });

                Mail::send('mail.enquiry', $data, function ($message) use ($data) {
                    $message->to('bsslbhawesh@gmail.com')->subject('Enquiry');
                    $message->from('bsslbhawesh@gmail.com', 'EGATE');
                });
                
            }
        Contact::create($input_data);
        return back()->with('message','Message sent Successfully!');
    }

}
