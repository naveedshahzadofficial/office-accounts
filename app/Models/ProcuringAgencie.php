<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProcuringAgencie extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['agency_procuring_registered', 'public_sector_organization_59e_registered', 'suppliers_registered', 'psmu_registered', 'agency_status','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model){
            $model->user_id = auth()->id();
        });
    }
}
