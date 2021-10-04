<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inspection extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['inspection_internal_conducted', 'inspection_verification_entries', 'inspection_pending_3_to_7', 'inspection_pending_more_than_7', 'inspection_miscellaneous_disposed_off', 'inspection_status','user_id'];

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
