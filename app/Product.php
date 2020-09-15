<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['pro_name','pro_code','pro_price','pro_image','pro_info','sp1_price','stock','category_id'];
}
