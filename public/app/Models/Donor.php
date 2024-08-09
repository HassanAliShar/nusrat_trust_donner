<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'contact_no',
        'children'
    ];

    public function payments(){
        return $this->hasMany(Payment::class);
    }
}
