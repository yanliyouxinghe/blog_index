<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
  protected $table = 'ecs_region';
 protected $guarded = [];
 protected $primaryKey = "region_id";

//  protected $fillable = ['attr_name','attr_values'];
 public $timestamps = false;
}
