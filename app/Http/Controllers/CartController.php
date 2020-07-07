<?php

namespace App\Http\Controllers;

use App\Cart_model;
use App\Wishlist;
use App\Review;
use App\Comparison;
use App\ProductAtrr_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $session_id=Session::get('session_id');
        $cart_datas=Cart_model::where('session_id',$session_id)->get();
        $total_price=0;
        foreach ($cart_datas as $cart_data){
            $total_price+=$cart_data->price*$cart_data->quantity;
        }
        return view('frontEnd.cart',compact('cart_datas','total_price'));
    }

    public function addToCart(Request $request){
        $inputToCart=$request->all();
        Session::forget('discount_amount_price');
        Session::forget('coupon_code');
        if($inputToCart['quantity']==""){
            return back()->with('message','Please select Quantity!');
        }else{
            $stockAvailable=DB::table('product_att')->select('stock','sku')->where(['products_id'=>$inputToCart['products_id']])->first();
            if($stockAvailable->stock>=$inputToCart['quantity']){
                $inputToCart['user_email']='bhawesh9696@gmail.com';
                $session_id=Session::get('session_id');
                if(empty($session_id)){
                    $session_id=str_random(40);
                    Session::put('session_id',$session_id);
                }
                $inputToCart['session_id']=$session_id;
                // $sizeAtrr=explode("-",$inputToCart['size']);
                // $inputToCart['size']=$sizeAtrr[1];
                $inputToCart['product_code']=$stockAvailable->sku;
                $count_duplicateItems=Cart_model::where(['products_id'=>$inputToCart['products_id'],
                    'product_color'=>$inputToCart['product_color']])->count();
                if($count_duplicateItems>0){
                    return back()->with('message','This Item is already added!');
                }else{
                    Cart_model::create($inputToCart);
                    return back()->with('message','Product Successfully added to Cart!');
                }
            }else{
                return back()->with('message','Stock is not Available!');
            }
        }
    }
    public function deleteItem($id=null){
        $delete_item=Cart_model::findOrFail($id);
        Session::forget('discount_amount_price');
        Session::forget('coupon_code');
        $delete_item->delete();
        return back()->with('message','Product Successfully deleted from Cart!');
    }
    public function updateQuantity($id,$quantity){
        Session::forget('discount_amount_price');
        Session::forget('coupon_code');
        $sku_size=DB::table('cart')->select('product_code','quantity')->where('id',$id)->first();
        $stockAvailable=DB::table('product_att')->select('stock')->where(['sku'=>$sku_size->product_code])->first();
        $updated_quantity=$sku_size->quantity+$quantity;
        if($stockAvailable->stock>=$updated_quantity){
            DB::table('cart')->where('id',$id)->increment('quantity',$quantity);
            return back()->with('message','Product Quantity updated Successfully!');
        }else{
            return back()->with('message','Stock is not Available!');
        }


    }


    public function wishList(Request $request)
    {       
        $userId = Auth::user()->id;    
           
        $rs = Wishlist::create([
            'products_id' => $request->input('products_id'),
            'product_name' => $request->input('product_name'),
            'product_code' => $request->input('product_code'), 
            'product_color' => $request->input('product_color'),
            'price' => $request->input('price'),
            'user_id' => $userId
        ]); 
       
        if($rs)
        {
            return back()->with('message','Product Successfully added to Wishlist!');
        }
       
        return back()->with('message','Something went wrong, Try Again !');
    }

    public function reviews(Request $request)
    {           
           
        $rs = Review::create([
            'product_id' => $request->input('product_id'),
            'name' => $request->input('name'),
            'message' => $request->input('message'), 
            'rating' => $request->input('rating')
        ]); 
       
        if($rs)
        {
            return back()->with('message','Product Review added Successfully!');
        }
       
        return back()->with('message','Something went wrong, Try Again!');
    }

    public function comparison(Request $request){
        $inputToCart=$request->all();
        Session::forget('discount_amount_price');
        Session::forget('coupon_code');
        if($inputToCart['quantity']==""){
            return back()->with('message','Please select Quantity!');
        }else{
            $stockAvailable=DB::table('product_att')->select('stock','sku')->where(['products_id'=>$inputToCart['products_id']])->first();
            if($stockAvailable->stock>=$inputToCart['quantity']){
                $inputToCart['user_email']='bhawesh9696@gmail.com';
                $session_id=Session::get('session_id');
                if(empty($session_id)){
                    $session_id=str_random(40);
                    Session::put('session_id',$session_id);
                }
                $inputToCart['session_id']=$session_id;
                // $sizeAtrr=explode("-",$inputToCart['size']);
                // $inputToCart['size']=$sizeAtrr[1];
                $inputToCart['product_code']=$stockAvailable->sku;
                $count_duplicateItems=Comparison::where(['products_id'=>$inputToCart['products_id'],
                    'product_color'=>$inputToCart['product_color']])->count();
                if($count_duplicateItems>0){
                    return back()->with('message','This Item is already added!');
                }else{
                    Comparison::create($inputToCart);
                    return back()->with('message','Product Successfully added for Comparison!');
                }
            }else{
                return back()->with('message','Stock is not Available!');
            }
        }
    }

    public function viewcompare(){
        $session_id=Session::get('session_id');
        $cart_datas=Comparison::where('session_id',$session_id)->get();
        $total_price=0;
        foreach ($cart_datas as $cart_data){
            $total_price+=$cart_data->price*$cart_data->quantity;
        }
        return view('frontEnd.viewcompare',compact('cart_datas','total_price'));
    }

    public function deleteWish($id=null){
        $delete_item=Wishlist::findOrFail($id);
        $delete_item->delete();
        return back()->with('message','Product Successfully deleted from Cart!');
    }

}
