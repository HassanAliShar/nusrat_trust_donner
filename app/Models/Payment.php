<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'recept_no',
        'amount',
        'payment_month',
        'payment_date',
        'donor_id'
    ];

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }
}
