<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'banner',
        'quota',
        'time',
        'location',
        'link',
        'price',
        'status'
    ];

    public function categories() 
    {
        return $this->belongsToMany('App\Models\Category');
    }

}