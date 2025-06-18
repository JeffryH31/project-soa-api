<?php

namespace App\Http\Controllers;

use App\Utils\HttpResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BaseController extends Controller
{
    /**
     * The model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */

    use HttpResponse;

    public $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource with the filter applied.
     * @return array|object list of all resource in the model
     */
    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 5); // default tetap 5 kalau gak dikirim
        $data = $this->model->with($this->model->relations())->paginate($perPage);
        return $this->success("Success", $data);
    }


    /**
     * Display a listing of the resource by Id
     * @return array|object list of all resource in the model
     */
    public function show($id)
    {
        $data = $this->model->with($this->model->relations())->find($id);
        return $this->success("Success", $data);
    }

    /**
     * Store a newly created resource in storage.
     * @return array|object created resource|error
     */
    public function store(Request $request)
    {
        $requestFillable = $request->only($this->model->getFillable());

        $valid = Validator::make($requestFillable, $this->model->validationRules(), $this->model->validationMessages());
        if ($valid->fails()) {
            return $this->error($valid->errors()->first());
        }

        $data =  $this->model->create($requestFillable);
        return $this->success("Success", $data);
    }

    /**
     * Find or Create a new Resource of model
     * @return array|object resource|error
     */
    public function firstOrCreate(Request $request)
    {
        $requestFillable = $request->only($this->model->getFillable());

        $valid = Validator::make($requestFillable, $this->model->validationRules(), $this->model->validationMessages());
        if ($valid->fails()) {
            return $this->error($valid->errors()->first());
        }

        $data =  $this->model->firstOrCreate($requestFillable);
        return $this->success("Success", $data);
    }

    /**
     * Update Resource
     * @return array|object updated resource
     */
    public function update(Request $request, $id)
    {
        $requestFillable = $request->only($this->model->getFillable());

        $valid = Validator::make($requestFillable, $this->model->validationRules(), $this->model->validationMessages());
        if ($valid->fails()) {
            return $this->error($valid->errors()->first());
        }

        $update = $this->model->find($id);
        if (!$update) {
            return $this->error("ID not Found!");
        }

        $update->update($requestFillable);

        return $this->success("Update success", $update);
    }

    /**
     * Update Resource Partially
     * @return array|object updated resource
     */
    public function updatePartial($data, $id)
    {
        $model = $this->model->find($id);
        if (!$model) {
            return ['error' => 'Id not Found!!'];
        }
        foreach ($data as $key => $val) {
            $model->{$key} = $val;
        }
        $model->save();

        $model->refresh();

        return $this->success("Updated successfully!", $model);
    }

    /**
     * Remove the specified resource from storage.
     * @return array message either error or success (key)
     */
    public function destroy($id)
    {
        $delete = $this->model->find($id);
        if (!$delete) {
            return $this->error("Id not found!");
        }
        $delete->delete();

        return $this->success("Successfully Deleted!");
    }
}
