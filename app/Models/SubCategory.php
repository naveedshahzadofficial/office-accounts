<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class SubCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['sub_category_name', 'category_id', 'sub_category_status'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d-m-Y');
    }
}
