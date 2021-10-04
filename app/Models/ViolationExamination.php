<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ViolationExamination extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['violation_website', 'violation_newspaper', 'violation_identified', 'violation_removed', 'violation_pending', 'violation_file', 'violation_status', 'user_id'];

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
