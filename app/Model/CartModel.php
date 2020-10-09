<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
		    protected $table = 'ecs_cart';
		    protected $guarded = []; 
		    protected $primaryKey = "cart_id";
			  
			    // protected $fillable = ['cat_name','enabled','attr_group'];
			public $timestamps = false;

			 public function getcartdata($user)
			{
					$data = self::select('ecs_cart.*','ecs_goods.goods_id','ecs_goods.goods_name','ecs_goods.shop_price','ecs_goods.goods_thumb')
								->leftjoin('ecs_goods','ecs_cart.goods_id','=','ecs_goods.goods_id')
								->where('user_id',$user)
								->get();
					return $data;
			}	
		
}
