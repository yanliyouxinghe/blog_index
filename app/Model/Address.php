<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
  protected $table = 'ecs_user_address';
 protected $guarded = [];
 protected $primaryKey = "address_id";

//  protected $fillable = ['attr_name','attr_values'];
 public $timestamps = false;
}
