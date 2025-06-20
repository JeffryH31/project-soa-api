<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventAddOn extends Model
{
    use HasUuids, HasFactory;

    protected $fillable = [
        'name',
        'price',
    ];

    public function validationRules()
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ];
    }

    public function validationMessages()
    {
        return [
            'name.required' => 'Nama tempat harus diisi.',
            'name.string' => 'Nama tempat harus berupa teks.',
            'name.max' => 'Nama tempat maksimal 255 karakter.',

            'price.required' => 'Harga harus diisi.',
            'price.numeric' => 'Harga harus berupa angka.',
            'price.min' => 'Harga minimal 0.',
        ];
    }

    // public function eventPackages()
    // {
    //     return $this->belongsToMany(EventPackage::class, 'event_reservation_add_ons');
    // }

    public function eventReservations()
    {
        return $this->belongsToMany(EventReservation::class, 'event_reservation_add_ons', 'event_add_on_id', 'event_reservation_id');
    }

    public function relations()
    {
        return [];
    }
    public function searchableFields()
    {
        return ['name'];
    }
}
