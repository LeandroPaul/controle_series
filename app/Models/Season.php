<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Episode;
use App\Models\Series;

class Season extends Model
{
    use HasFactory;

    protected $fillable = ['numero'];
    public $timestamps = false;


    public function episodes(){
        return $this->hasMany(Episode::class);
    }

    public function series(){
        return $this->belongsTo(Series::class);
    }
}
