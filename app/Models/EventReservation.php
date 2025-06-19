<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventReservation extends Model
{
    use HasUuids, HasFactory;

    protected $fillable = [
        'customer_name',
        'event_package_id',
        'event_date',
        'notes',
        'total_price',
        'status',
    ];

    protected $casts = [
        'event_date' => 'date',
        'total_price' => 'decimal:2',
    ];

    public function eventPackage()
    {
        return $this->belongsTo(EventPackage::class);
    }
}
