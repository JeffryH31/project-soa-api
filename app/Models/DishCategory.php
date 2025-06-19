<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DishCategory extends Model
{
    use HasUuids, HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $casts = [
        'id' => 'string',
        'name' => 'string',
    ];

    public function eventMenus()
    {
        return $this->hasMany(EventMenu::class);
    }

    public function validationRules()
    {
        return [
            'name' => 'required|string|max:255',
        ];
    }

    public function validationMessages()
    {
        return [
            'name.required' => 'Nama kategori harus diisi.',
            'name.string' => 'Nama kategori harus berupa teks.',
            'name.max' => 'Nama kategori maksimal 255 karakter.',
        ];
    }

    public function relations()
    {
        return [];
    }
}
