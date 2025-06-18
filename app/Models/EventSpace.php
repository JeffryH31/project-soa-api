<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventSpace extends Model
{
    use HasUuids, HasFactory;

    protected $fillable = [
        'name',
        'location',
        'capacity',
        'price',
    ];

    protected $casts = [
        'capacity' => 'integer',
        'price' => 'decimal:2',
    ];

    public function eventPackages()
    {
        return $this->hasMany(EventPackage::class);
    }
}
