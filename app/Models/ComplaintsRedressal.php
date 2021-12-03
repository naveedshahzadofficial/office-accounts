<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ComplaintsRedressal extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['complaint_disposed', 'complaint_pending_3_to_7', 'complaint_pending_more_than_7', 'complaint_total_other_more_than_7', 'complaint_pending_other_3_to_7', 'complaint_pending_other_more_than_7','complaint_status', 'user_id'];

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
