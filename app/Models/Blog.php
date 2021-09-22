<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $guarded = [];

    public function blogCategory(){
        return $this->belongsTo(BlogCategory::class, 'id_ofcategory', 'id');
    }

}