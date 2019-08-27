<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use App\Models\Admin;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = 
    [
    	'name','image',
    	'price','quantity',
    	'details','description',
    	'product_new','end_offer_at',
    	'price_offer','discount_value',
    	'category_id'
    ];

      public function admin()
        {
            return $this->belongsTo(Admin::class,'admin_id');
        }

      public function category()
        {
            return $this->belongsTo(Category::class,'category_id');
        }

      public function colors()
        {
            return $this->belongsToMany(Color::class,'product_color'); 
        }

      public function sizes()
        {
            return $this->belongsToMany(Size::class,'product_sizes'); 
        }


}
