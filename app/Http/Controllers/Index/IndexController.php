<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\GoodsModel;
use App\Model\CategoryModel;
class IndexController extends Controller
{
        public function index(){
            $goodsModel = new GoodsModel;
            $cateModel = new CategoryModel;

            //轮播图
            $goods = $goodsModel->luobotu();
            //获取分类数据
            $catedata = $cateModel->putcate();
            //无限极分类
            $tree = $this->Treecate($catedata);
            //今日推荐
            $is_new = $goodsModel->Isnew();
            //猜你喜欢
            $islove = $goodsModel->Islove();
            // dd($islove);
            // dump($tree);die;
            return view('Index.index.index',['goods'=>$goods,'tree'=>$tree,'is_new'=>$is_new,'islove'=>$islove]);
        }

        //无限极分类
        public function Treecate($catedata,$parent_id=0,$level=0){
                $tree = [];
                foreach($catedata as $k=>$v){
                    if($v['parent_id'] == $parent_id){
                        $tree[$k] = $v;
                        $tree[$k]['son'] =  $this->Treecate($catedata,$v['cat_id'],$level+1);
                    }
                }
                return $tree;
        }

      

       
        
       
        
       
    
}
