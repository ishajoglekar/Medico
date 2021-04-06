<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $fillable = ['name','size','image','description','price','quantity','how_to_use','highlights','benefits','manufacturer_id','ingredient_id','subcategory_id','category_id','prescription_required','status'];
    protected $guarded = [];

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
    public function ingredients()
    {
        return $this->belongsToMany(Ingredients::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class)->withPivot('quantity');
    }
    public function coupons()
    {
        return $this->belongsToMany(Coupon::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('count','order_id');
    }
}
