<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Transaction;
use Auth;

class Event extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'title',
        'slug',
        'user_id',
        'description',
        'banner',
        'quota',
        'time',
        'location_link',
        'price',
        'type',
        'status'
    ];

    public function getIsRegisteredAttribute()
    {
        if (!Auth::check()) {
            return false;
        }

        return Transaction::where('event_id', $this->id)->where('user_id', Auth::id())->exists();
    }

    public function getCategoryIdAttribute()
    {
        return $this->categories->pluck('id');
    }

    public function categories() 
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}