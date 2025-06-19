<?php

namespace App\Http\Controllers;

use App\Models\EventMenu;
use Illuminate\Http\Request;

class EventMenuController extends BaseController
{
    public function __construct(EventMenu $model)
    {
        parent::__construct($model);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $data['image'] = $path;
        }
        $newRequest = new Request($data);
        return parent::store($newRequest);
    }
}
