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

    public function validationRules()
    {
        return [
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ];
    }

    public function validationMessages()
    {
        return [
            'name.required' => 'Nama tempat harus diisi.',
            'name.string' => 'Nama tempat harus berupa teks.',
            'name.max' => 'Nama tempat maksimal 255 karakter.',

            'location.required' => 'Lokasi harus diisi.',
            'location.string' => 'Lokasi harus berupa teks.',
            'location.max' => 'Lokasi maksimal 255 karakter.',

            'capacity.required' => 'Kapasitas harus diisi.',
            'capacity.integer' => 'Kapasitas harus berupa angka.',
            'capacity.min' => 'Kapasitas minimal 1 orang.',

            'price.required' => 'Harga harus diisi.',
            'price.numeric' => 'Harga harus berupa angka.',
            'price.min' => 'Harga minimal 0.',
        ];
    }

    public function relations()
    {
        return [];
    }
}
