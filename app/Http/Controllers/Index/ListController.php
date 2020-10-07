<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\GoodsModel;
use App\Model\BrandModel;
class ListController extends Controller
{
    public function index($cat_id){
        //商品
        $GoodsModel = new GoodsModel();
        //分类
        $goods = $GoodsModel->getgoodsdata($cat_id);
       
        //品牌logo
        $brand_ids = $GoodsModel->getbrand($cat_id);
        array_push($brand_ids,$cat_id);
        $brand_ids = array_unique($brand_ids);
        $BrandModel  = new BrandModel();
        $brand = $BrandModel->getbrand($brand_ids);
         //价格区间
        $max_price = $GoodsModel->getmaxprice($cat_id);
        if(strlen($max_price) < 3){
            return false;   
        }
         $shop_poice = $this->pricejian($max_price);
        
        //  dd($shop_poice);
         
        return view('Index.index.list',compact(['goods','brand','shop_poice']));
    }

        public function pricejian($shop_price){
            $length_price = strlen($shop_price);
            $price_qu = '1'.str_repeat(0,$length_price-4);
            $price = substr($shop_price,0,1);
            $price = $price*$price_qu;
            $end_prices = [];
            $avgprice = $price/5;
            for($i=0,$j=1;$i<$price;$i++,$j++){
                $end_prices[] = $i.'-'.$avgprice*$j.'元';
                $i = $avgprice*$j-1;
            }
            $end_prices[] = $price.'元以上';
            return $end_prices;
        }

}
