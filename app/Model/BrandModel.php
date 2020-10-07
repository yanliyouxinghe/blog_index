<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
  protected $table = 'brand';
 protected $guarded = [];
 protected $primaryKey = "brand_id";

//  protected $fillable = ['attr_name','attr_values'];
 public $timestamps = false;


    public function getbrand($ids)
    {
        $branddata = self::select('brand_id','brand_name','brand_logo')->whereIn('brand_id',$ids)->get();
        return $branddata;
    }

   

}
