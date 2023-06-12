<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primarykey = 'id';
    protected $guarded = [];
    protected $fillable = ['first_name','last_name','address','city','country','phone','node'];

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }
}
