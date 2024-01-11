<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rayon extends Model
{
    use HasFactory;

    protected $fillable = [
        'rayon',
        'user_id'
    ];

    public function user() 
    {
        return $this->belongsTo(user::class);
    }
}
