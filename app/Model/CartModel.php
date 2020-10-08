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

				
		
}
