<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','package_ref','amount','payment_due_date','payment_date','payment_method','ref_image','admin_confirmation','created_at'
    ];
}
