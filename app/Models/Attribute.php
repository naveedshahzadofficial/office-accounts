<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Attribute extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'status', ];

    public function attributes_values():HasMany
    {
        return $this->hasMany(AttributeValue::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d-m-Y');
    }
}
