<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
class GalleryModel extends Model
{
    protected $table = 'ecs_goods_gallery';
    protected $primaryKey = "img_id";

    protected $guarded = [];
  
    // protected $fillable = ['cat_name','enabled','attr_group'];
    public $timestamps = false;
}