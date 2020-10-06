<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
  protected $table = 'attribute';
 protected $guarded = [];
 protected $primaryKey = "attr_id";

//  protected $fillable = ['attr_name','attr_values'];
 public $timestamps = false;
}
