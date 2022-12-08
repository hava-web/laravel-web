<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductColors extends Model
{
    use HasFactory;
    protected $table = 'product_colors';
    protected $fillable = [
        'product_id',
        'color_id',
        'quantity',
    ];   

    public function color()
    {
        return $this->belongsTo(Color::class,'color_id','id');
    }

    /**
     * Get all of the orderItem for the ProductColors
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItem(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'product_color_id', 'id');
    }
}
