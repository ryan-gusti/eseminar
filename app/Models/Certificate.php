<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $casts = [
        'file_font' => 'array',
        'font_colour' => 'array',
        'position' => 'array',
    ];

    protected $fillable = [
        'name',
        'code',
        'file_certificate',
        'file_font',
        'font_colour',
        'position',
        'status'
    ];

    public function setFilenamesAttribute($value)
    {
        $this->attributes['file_font'] = json_encode($value);
    }
}
