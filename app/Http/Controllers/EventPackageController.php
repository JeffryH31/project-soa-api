<?php

namespace App\Http\Controllers;

use App\Models\EventPackage;
use App\Models\EventSpace;
use App\Models\EventMenu;
use App\Models\EventAddOn;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EventPackageController extends BaseController
{
    public function __construct(EventPackage $model)
    {
        parent::__construct($model);
    }

    public function search(Request $request)
    {
        $query = EventPackage::query();

        if ($request->has('search') && $request->search !== '') {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('id', $request->search);
            });
        }

        $data = $query->orderBy('id')->paginate(5);

        return $this->success("Success", $data);
    }
}
