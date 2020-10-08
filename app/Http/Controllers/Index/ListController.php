<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\GoodsModel;
use App\Model\BrandModel;
use App\Model\CategoryModel;
class ListController extends Controller
{
    public function index($cat_id){
        // dd($cat_id);
        //获取搜索的值
        $query = request()->all();
        $where = [];
        if(isset($query['price'])){
            //去除价格中的元字
            $price_array = explode('元',$query['price']);
            //去除价格中的-
            $price_array = explode('-',$price_array[0]);
            $where[] =  [
                'shop_price','>',$price_array[0]
            ];
            if(isset($price_array[1])){
                //如果价格中的索引1存在说明有最大值
                $where[] =  [
                    'shop_price','<',$price_array[1]
                ];
            }
        }
        //根据品牌搜索
        if(isset($query['brand_id'])){
            $where[] = [
                'brand_id','=',$query['brand_id']
            ];
        }

        //根据用户点击的分类id获取子分类
        $soncate_id = CategoryModel::where('parent_id',$cat_id)->pluck('cat_id');
        $soncate_id = $soncate_id?$soncate_id->toArray():[];
        // dd($soncate_id);
        //将用户点击的分类id 追加到要查询的id中
        array_push($soncate_id,$cat_id);
        // dd($soncate_id); 
        //商品
        $GoodsModel = new GoodsModel();
        //根据分类id查询此分类下的所有商品
        $goods = $GoodsModel->getgoodsdata($soncate_id,$where);
    //    dd($goods);
        //根据分类id查询此分类下所有的商品所属的品牌
        $brand_ids = $GoodsModel->getbrand($soncate_id);
        $brand_ids = $brand_ids?$brand_ids->toArray():[];
        //去除重复的品牌id
        $brand_ids = array_unique($brand_ids);
        // dd($brand_ids);
        $BrandModel  = new BrandModel();
        //根据品牌id查询品牌数据
        $brand = $BrandModel->getbrand($brand_ids);
         //价格区间
        $max_price = $GoodsModel->getmaxprice($soncate_id);
         $shop_poice = $this->pricejian($max_price);
        //获取当前url
        // dd($_SERVER);
        $url = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
        // dd($url);
         
        return view('Index.index.list',compact(['goods','brand','shop_poice','url','query']));
    }


        //计算价格区间
        public function pricejian($shop_price){
            //最大价格的长度
            $length_price = strlen($shop_price);
            //取证
            $price_qu = '1'.str_repeat(0,$length_price-4);
            $price = substr($shop_price,0,1);
            //最大价格
            $price = $price*$price_qu;
            $end_prices = [];
            //平均价格区间
            $avgprice = $price/5;
            for($i=0,$j=1;$i<$price;$i++,$j++){
                $end_prices[] = $i.'-'.$avgprice*$j.'元';
                $i = $avgprice*$j-1;
            }
            $end_prices[] = $price.'元以上';
            return $end_prices;
        }

}
