<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Spatie\SchemalessAttributes\Casts\SchemalessAttributes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['category_id', 'sub_category_id', 'product_name', 'unit_id', 'unit_price', 'shipping_type', 'shipping_cost', 'description', 'product_status'];

    public $casts = [
        'attributes' => SchemalessAttributes::class,
    ];

    public function scopeWithExtraAttributes(): Builder
    {
        return $this->attributes->modelScope();
    }

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function sub_category():BelongsTo
    {
        return $this->belongsTo(SubCategory::class);
    }
}
