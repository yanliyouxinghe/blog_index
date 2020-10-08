<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\GoodsModel;
use App\Model\GalleryModel;
use App\Model\GoodsAttr;
use App\Model\Attribute;
use App\Model\ProductModel;
use App\Model\CartModel;
class CartController extends Controller
{
    public function addcart()
    {		
    	$user_id = session()->get('user_id');
      // dd($_SERVER);
    	if(!$user_id){
        $url = $_SERVER['HTTP_REFERER'];
    		return json_encode(['code'=>1,'mag'=>'请先登录','data'=>$url]);die;
    	}
       $goods_id = request()->input('goods_id');
       $goods_attr_id = request()->input('goods_attr_id');
       $buy_number = request()->input('buy_number');
       // dd($buy_number);
       if(!$goods_id || !$buy_number){
        return json_encode(['code'=>2,'mag'=>'缺少参数']);die;
       }
       $goods = GoodsModel::select('goods_id','goods_name','goods_sn','shop_price','is_on_sale','goods_number')->where('goods_id',$goods_id)->first();
       if(!$goods->is_on_sale){
           return json_encode(['code'=>3,'mag'=>'商品已下架']);die;
       }
       if($goods_attr_id){
            $goods_attr_id = implode('|', $goods_attr_id);
           $product = ProductModel::select('product_id','product_number')->where(['goods_id'=>$goods_id,'goods_attr'=>$goods_attr_id])->first();
           // dd($product);
            if($product->product_number<$buy_number ){
                return json_encode(['code'=>4,'mag'=>'存库不足']);die;
            }
       }else{
        if($goods->goods_number<$buy_number ){
                return json_encode(['code'=>5,'mag'=>'存库不足']);die;
            }
       }

       $cart = CartModel::where(['user_id'=>$user_id,'goods_id'=>$goods_id,'goods_attr_id'=>$goods_attr_id])->first();
        if($cart){
          $buy_number = $cart->buy_number+$buy_number;
          // dd($buy_number);
          if($goods_attr_id){
              if($product->product_number<$buy_number){
               $buy_number = $product->product_number;
            }
          }else{
            if($goods->goods_number<$buy_number){
               $buy_number = $goods->goods_number;
            }
            
            }
            // dd('111');

            $res = CartModel::where('cart_id',$cart->cart_id)->update(['buy_number'=>$buy_number]);
          }else{
            // dd('111');
            $data = [
              'user_id'=>$user_id,
              'product_id'=>$product->product_id??0,
              'buy_number'=>$buy_number,
              'goods_attr_id'=>$goods_attr_id??''
            ];
            $goods = $goods?$goods->toArray():[];
            // dd($goods);
            unset($goods['is_on_sale']);
            unset($goods['goods_number']);
            $data = array_merge($data,$goods);
             // dd($data);
            $res = CartModel::insert($data);

          }
          if($res){
             return json_encode(['code'=>0,'mag'=>'加入购物车成功']);die;
          }



        }

        }

