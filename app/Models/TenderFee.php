<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TenderFee extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['fee_document_examined', 'fee_violations_identified', 'fee_verification_deposit', 'fee_login_ids_activated', 'fee_login_ids_deactivated', 'fee_status','user_id'];

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
