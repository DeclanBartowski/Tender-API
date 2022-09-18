<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    use HasFactory;

    protected $fillable = [
        'external_id',
        'number',
        'status',
        'name',
        'date',
    ];

    protected $casts = [
        'date' => 'datetime'
    ];

    public function getRouteKeyName()
    {
        return 'external_id';
    }

}
