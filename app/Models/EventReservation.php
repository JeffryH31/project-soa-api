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
        'start_date',
        'end_date',
        'pax',
        'notes',
        'total_price',
        'status',
        'event_space_id',
        'event_menu_id',
        // 'event_add_ons_id',
    ];

    protected $casts = [
        'event_date' => 'date',
        'total_price' => 'decimal:2',
    ];

    public function validationRules()
    {
        return [
            'customer_name' => 'required|string|max:255',
            // 'event_package_id' => 'required|uuid|exists:event_packages,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'notes' => 'nullable|string|max:500',
            'pax' => 'required|numeric|max:500',
            'total_price' => 'nullable|numeric|min:0',
            'event_space_id' => 'required|uuid|exists:event_spaces,id',
            'status' => 'nullable|in:pending,dp1,dp2,paid,cancelled',
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

            'start_date.required' => 'Tanggal mulai acara harus diisi.',
            'start_date.date' => 'Tanggal mulai acara harus berupa tanggal yang valid.',

            'end_date.required' => 'Tanggal berakhir acara harus diisi.',
            'end_date.date' => 'Tanggal berakhir acara harus berupa tanggal yang valid.',
            'end_date.after_or_equal' => 'Tanggal berakhir acara harus sama dengan atau setelah tanggal mulai acara.',

            'notes.string' => 'Permintaan khusus harus berupa teks.',
            'notes.max' => 'Permintaan khusus maksimal 500 karakter.',

            'total_price.required' => 'Total harga harus diisi.',
            'total_price.numeric' => 'Total harga harus berupa angka.',
            'total_price.min' => 'Total harga tidak boleh kurang dari 0.',

            'status.required' => 'Status harus diisi.',
            'status.in' => 'Status harus salah satu dari: pending, confirmed, cancelled.',

            'event_space_id.required' => 'Event Space harus dipilih.',
            'event_space_id.uuid' => 'ID Event Space harus valid UUID.',
            'event_space_id.exists' => 'Event Space yang dipilih tidak ditemukan.',
        ];
    }

    // public function eventPackage()
    // {
    //     return $this->belongsTo(EventPackage::class);
    // }

    public function eventMenus()
    {
        return $this->belongsToMany(EventMenu::class, 'event_reservation_menus', 'event_reservation_id', 'event_menu_id');
    }

    public function relations()
    {
        return ['eventMenus'];
    }

    public function dishCategory()
    {
        return $this->belongsTo(DishCategory::class);
    }
}
