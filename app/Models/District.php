<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $table = 'district';

    protected $guarded = [];

    public function ward() {
        return $this->hasOne(Ward::class, 'maquanhuyen', 'maquanhuyen');
    }
}