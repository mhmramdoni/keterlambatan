<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'name',
        'rombel_id',
        'rayon_id',
     

        
    ];

    public function rombel() 
    {
        return $this->belongsTo(rombel::class);
    }

    public function rayon() 
    {
        return $this->belongsTo(rayon::class);
    }

    public function latest() 
    {
        return $this->hasMany(latest::class);
    }
}
