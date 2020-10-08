<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\GoodsModel;
use App\Model\GalleryModel;
use App\Model\GoodsAttr;
use App\Model\Attribute;
use App\Model\ProductModel;
class PartController extends Controller
{
    public function particulars($id){
        //获取当前$id的数据
        $goods = $this->putgoods($id);
        //相册
        // dd($goods);
        $gallery = $this->putgallery($id);
        //属性
        $attr = $this->putattr($id);
        //简介
        $jianjie = $this->jianjie($id);
        //规格
        $guige = $this->guige($id);
        
       
        // dd($guige);
        return view('Index.index.part',['goods'=>$goods,'gallery'=>$gallery,'attr'=>$attr,'jianjie'=>$jianjie,'guige'=>$guige]);
    }      

    //图片
    public function putgoods($id){
       $goods =  GoodsModel::where('goods_id',$id)->get();
       return $goods;
    }
    //相册
    public function putgallery($id){
        $gallery =  GalleryModel::where('goods_id',$id)
                    ->get();
          return $gallery;
     }
     //属性

    public function putattr($goods_id){
        $goodsattr = GoodsAttr::select('goods_attr_id','ecs_goods_attr.attr_id','attribute.attr_name','ecs_goods_attr.attr_value')
                     ->leftjoin('attribute','ecs_goods_attr.attr_id','=','attribute.attr_id')
                     ->where(['goods_id'=>$goods_id,'attribute.attr_type'=>0])
                     ->get();
        return $goodsattr;
     }
     //简介
     public function jianjie($goods_id){
        $janj = GoodsModel::select('goods_id','goods_desc')
                ->where('goods_id',$goods_id)
                ->first();
        return $janj;
     }
     //规格
     public function guige($goods_id){  
        $guige = GoodsAttr::select('goods_attr_id','ecs_goods_attr.attr_id','attribute.attr_name','ecs_goods_attr.attr_value')
        ->leftjoin('attribute','ecs_goods_attr.attr_id','=','attribute.attr_id')
        ->where(['goods_id'=>$goods_id,'attribute.attr_type'=>1])
        ->get();

        $data = [];
        if( $guige ){
            foreach($guige as $k=>$v){
                $data[$v['attr_id']]['attr_name'] = $v['attr_name'];
               $data[$v['attr_id']]['attr_value'][$v['goods_attr_id']] =  $v['attr_value'];     
             }
             return $data;
        }
        return $guige;
     }

     public function getattrprice(){
         $goods_attr_id = request()->goods_attr_id;
         $goods_id = request()->goods_id;

        $attr_price = GoodsAttr::whereIn('goods_attr_id',$goods_attr_id)
                     ->sum('attr_price');
                    //  dd($attr_price);
        $end_price = GoodsModel::where('goods_id',$goods_id)->value('shop_price')+$attr_price;
        $end_price = number_format($end_price,2,".","");
        return json_encode(['code'=>0,'msg'=>'OK','data'=>$end_price]);
        // dd($end_price);
     }

         public function putgoodsnum($goods_id){
                $aa = GoodsModel::select('goods_id','goods_number')
                ->where('goods_id',$goods_id)
                ->first();
        return $aa;
         }


         public function getgoodsattrnum(){
            //获取货品存库
            $goods_attr_id = request()->input('goods_attr_id');
            $goods_attr_id = implode('|',$goods_attr_id );
            // dd($goods_attr_id);
            $goods_number = ProductModel::select('product_number')->where('goods_attr',$goods_attr_id)->first();
               if($goods_number){
                return json_encode(['code'=>'0','msg'=>'OK','data'=>$goods_number->product_number]);
               }else{
                 return json_encode(['code'=>'1','msg'=>'存库不足','data'=>'0']);
               }
         }

         //获取商品存库
         public function getgoodsnum(){
            $goods_id = request()->input('goods_id');
             $goods_num = GoodsModel::select('goods_number')->where('goods_id',$goods_id)->first();
              if($goods_num){
                 return json_encode(['code'=>'0','msg'=>'OK','data'=>$goods_num]);
             }else{
                 return json_encode(['code'=>'1','msg'=>'存库不足','data'=>'0']);

             }
         }


}
