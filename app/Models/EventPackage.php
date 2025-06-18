<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventPackage extends Model
{
    use HasUuids, HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'pax',
        'event_space_id',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'pax' => 'integer',
    ];

    public function eventSpace()
    {
        return $this->belongsTo(EventSpace::class);
    }

    public function eventMenus()
    {
        return $this->belongsToMany(EventMenu::class, 'event_package_menus');
    }

    public function eventAddOns()
    {
        return $this->belongsToMany(EventAddOn::class, 'event_reservations_addons');
    }

    public function eventReservations()
    {
        return $this->hasMany(EventReservation::class);
    }
}
