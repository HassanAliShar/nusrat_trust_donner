<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahanakifalat extends Model
{
    use HasFactory;

    protected $fillable = [
        'donor_id',
        'families',
    ];

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }
}
