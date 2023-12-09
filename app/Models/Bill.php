<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'provider_id',
        'billing_date',
        'expiration_date',
        'cost',
        'bonus_date',
        'bonus_amount',
        'foul_amount',
        'payment_date',
        'updated_at',
        'created_at',
        'final_cost'
    ];

    protected $casts = [
        'billing_date' => 'datetime',
        'expiration_date' => 'datetime',
        'bonus_date' => 'datetime',
        'payment_date' => 'datetime',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function provider(){
        return $this->belongsTo(Provider::class);
    }


}
