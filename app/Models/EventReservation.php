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
        // 'event_package_id',
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

    public function eventMenus()
    {
        return $this->hasMany(EventMenu::class);
    }

    public function validationRules()
    {
        return [
            'customer_name' => 'required|string|max:255',
            // 'event_package_id' => 'required|uuid|exists:event_packages,id',
            'event_date' => 'required|date',
            'notes' => 'nullable|string|max:500',
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|in:pending,confirmed,cancelled',
        ];
    }
    public function validationMessages()
    {
        return [
            'customer_name.required' => 'Nama pelanggan harus diisi.',
            'customer_name.string' => 'Nama pelanggan harus berupa teks.',
            'customer_name.max' => 'Nama pelanggan maksimal 255 karakter.',

            // 'event_package_id.required' => 'Paket acara harus dipilih.',
            // 'event_package_id.uuid' => 'ID paket acara harus berupa UUID.',
            // 'event_package_id.exists' => 'Paket acara yang dipilih tidak ditemukan.',

            'event_date.required' => 'Tanggal acara harus diisi.',
            'event_date.date' => 'Tanggal acara harus berupa tanggal yang valid.',

            'notes.string' => 'Permintaan khusus harus berupa teks.',
            'notes.max' => 'Permintaan khusus maksimal 500 karakter.',

            'total_price.required' => 'Total harga harus diisi.',
            'total_price.numeric' => 'Total harga harus berupa angka.',
            'total_price.min' => 'Total harga tidak boleh kurang dari 0.',

            'status.required' => 'Status harus diisi.',
            'status.in' => 'Status harus salah satu dari: pending, confirmed, cancelled.',
        ];
    }
    public function relations()
    {
        return [];
    }

    public function dishCategory()
    {
        return $this->belongsTo(DishCategory::class);
    }
}
