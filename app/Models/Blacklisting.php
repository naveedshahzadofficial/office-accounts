<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blacklisting extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['blacklist_order', 'blacklisting_case_disposed_off', 'blacklisting_pending_15_to_30','blacklisting_pending_more_than_30', 'blacklisting_status', 'user_id'];

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
