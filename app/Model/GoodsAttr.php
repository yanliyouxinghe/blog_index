<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GoodsAttr extends Model
{
    protected $table = 'ecs_goods_attr';
    protected $guarded = [];
    protected $primaryKey = "goods_attr_id";
  
    // protected $fillable = ['cat_name','enabled','attr_group'];
    public $timestamps = false;



}

