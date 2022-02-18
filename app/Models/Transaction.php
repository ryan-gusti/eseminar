<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'event_id',
        'user_id',
        'item_price',
        'payment_status',
        'midtrans_url',
        'midtrans_booking_code'
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id', 'id')->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}