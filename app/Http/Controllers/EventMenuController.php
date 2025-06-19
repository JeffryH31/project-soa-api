<?php

namespace App\Http\Controllers;

use App\Models\EventMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventMenuController extends BaseController
{
    public function __construct(EventMenu $model)
    {
        parent::__construct($model);
    }

    public function store(Request $request)
    {
        $requestFillable = $request->only($this->model->getFillable());

        $valid = Validator::make($requestFillable, $this->model->validationRules(), $this->model->validationMessages());
        if ($valid->fails()) {
            return $this->error($valid->errors()->first());
        }

        $image_path = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name =  $request->name . '.' . $file->getClientOriginalExtension();
            $image_path = $file->storePubliclyAs('event/menu',  $file_name, 'public');
            $requestFillable['image'] = $image_path;
        }

        $data =  $this->model->create($requestFillable);
        return $this->success("Success", $data);
    }

    public function update(Request $request, $id)
    {
        $requestFillable = $request->only($this->model->getFillable());

        $valid = Validator::make($requestFillable, $this->model->validationRules(true), $this->model->validationMessages());
        if ($valid->fails()) {
            return $this->error($valid->errors()->first());
        }

        $image_path = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name =  $request->name . '.' . $file->getClientOriginalExtension();
            $image_path = $file->storePubliclyAs('event/menu',  $file_name, 'public');
            $requestFillable['image'] = $image_path;
        }

        $update = $this->model->find($id);
        if (!$update) {
            return $this->error("ID not Found!");
        }

        $update->update($requestFillable);

        return $this->success("Update success", $update);
    }
}
