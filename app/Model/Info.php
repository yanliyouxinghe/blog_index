<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
  protected $table = 'info';
 protected $guarded = [];
 protected $primaryKey = "info_id";

//  protected $fillable = ['attr_name','attr_values'];
 public $timestamps = false;
}
