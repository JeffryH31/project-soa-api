<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventMenu extends Model
{
    use HasUuids, HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'dish_category_id',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    public function dishCategory()
    {
        return $this->belongsTo(DishCategory::class);
    }

    public function eventPackages()
    {
        return $this->belongsToMany(EventPackage::class, 'event_package_menus');
    }
}
