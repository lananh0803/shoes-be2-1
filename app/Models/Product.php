<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primarykey = 'id';
    protected $guarded = [];
    protected $fillable = ['brand_id','product_category_id','name','description','content','price','qty','discount','rating'];

    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id','id');
    }

    public function productImages(){
        return $this->hasMany(ProductImage::class,'product_id','id');
    }
    public function productDetails(){
        return $this->hasMany(ProductDetail::class,'product_id','id');
    }

    public function productComments(){
        return $this->hasMany(ProductComment::class,'product_id','id');
    }
    public function orderDetails(){
        return $this->hasMany(OrderDetail::class,'product_id','id');
    }

    public function productCategories(){
        return $this->belongsTo(ProductCategory::class,'product_category_id','id');
    }
    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_items');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
