<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Color extends Model
{
    use HasFactory;
    protected $table = 'colors';
    protected $fillable = [
        'name',
        'code',
        'status',
    ];

    /**
     * Get all of the productColor for the Color
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productColor(): HasMany
    {
        return $this->hasMany(ProductColors::class, 'product_color_id', 'id');
    }
}
