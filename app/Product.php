<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $fillable = [
'product_name',
'company_id',
'price',
'stock',
'comment',
// 'image',
    ];
}
