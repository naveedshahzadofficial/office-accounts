<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advice extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['advice_issued', 'advice_pending_3_to_10', 'advice_pending_more_than_10','user_id', 'advice_status'];

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
