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
    ];

    protected $casts = [
        'total_price' => 'decimal:2',
    ];

    public function eventMenus()
    {
        return $this->belongsToMany(EventMenu::class, 'event_reservation_menus', 'event_reservation_id', 'event_menu_id');
    }

    public function dishCategory()
    {
        return $this->belongsTo(DishCategory::class);
    }

    public function relations()
    {
        return ['eventMenus'];
    }

    public function validationRules()
    {
        return [
            'customer_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'notes' => 'nullable|string|max:500',
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|in:pending,dp1,dp2,paid,cancelled',
            'event_space_id' => 'required|uuid|exists:event_spaces,id',
        ];
    }

    public function validationMessages()
    {
        return [
            'customer_name.required' => 'Nama pelanggan harus diisi.',
            'start_date.required' => 'Tanggal mulai harus diisi.',
            'end_date.required' => 'Tanggal akhir harus diisi.',
            'total_price.required' => 'Total harga harus diisi.',
            'status.required' => 'Status harus diisi.',
            'event_space_id.required' => 'Ruang acara harus dipilih.',
        ];
    }
}
