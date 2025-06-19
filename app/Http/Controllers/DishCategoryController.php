<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DishCategory;

class DishCategoryController extends BaseController
{
    public function __construct(DishCategory $model)
    {
        parent::__construct($model);
    }
}
