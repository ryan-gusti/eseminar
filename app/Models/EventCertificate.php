<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;
use Auth;

class EventCertificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'ketua_pelaksana',
        'ttd_pelaksana',
        'pemateri',
        'ttd_pemateri',
        'logo',
        'sertifikat'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    
}
