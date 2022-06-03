<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Role extends Model
{
    use HasFactory, SoftDeletes, HasAdvancedFilter;

    protected $fillable = ['role_name', 'role_status'];
    protected $orderable = ['id', 'role_name', 'role_status'];
    protected $filterable = ['id', 'role_name', 'role_status'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at',];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d-m-Y');
    }
}
