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

    public function validationRules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'pax' => 'required|integer|min:1',
            'event_space_id' => 'required|uuid|exists:event_spaces,id',
        ];
    }

    public function validationMessages()
    {
        return [
            'name.required' => 'Nama paket harus diisi.',
            'name.string' => 'Nama paket harus berupa teks.',
            'name.max' => 'Nama paket tidak boleh lebih dari 255 karakter.',

            'description.required' => 'Deskripsi paket harus diisi.',
            'description.string' => 'Deskripsi paket harus berupa teks.',

            'price.required' => 'Harga paket harus diisi.',
            'price.numeric' => 'Harga paket harus berupa angka.',
            'price.min' => 'Harga paket tidak boleh kurang dari 0.',

            'pax.required' => 'Jumlah pax harus diisi.',
            'pax.integer' => 'Jumlah pax harus berupa angka bulat.',
            'pax.min' => 'Jumlah pax minimal adalah 1.',

            'event_space_id.required' => 'Event space harus dipilih.',
            'event_space_id.uuid' => 'ID event space harus berupa UUID.',
            'event_space_id.exists' => 'Event space yang dipilih tidak ditemukan.',
        ];
    }

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

    public function relations()
    {
        return [];
    }
}
