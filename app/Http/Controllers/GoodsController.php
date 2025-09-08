<?php

namespace App\Http\Controllers;

use App\Http\Requests\GoodStoreRequest;
use App\Http\Resources\GoodsResource;
use App\Models\Good;
use App\Models\GoodProperty;

class GoodsController extends Controller
{
    public function index(array $data)
    {
        $date = now();
        if ($data['filterByDate']) {
            return GoodsResource::collection(
                Good::query()->whereBetween('created_at', [$date->subDay(), $date])->get()
            );
        } else {
            return GoodsResource::collection(Good::all());
        }
    }

    public function create(GoodStoreRequest $request)
    {
        $good = Good::query()->create($request->all());
        foreach ($request->all()['remains'] as $remainData) {
            $good->remains()->create($remainData);
        }
        foreach ($request->all()['properties'] as $propertyData) {
            GoodProperty::query()->create($propertyData);
            $good->properties()->create($propertyData);
        }
        return $good;
    }

    public function update(GoodStoreRequest $request, Good $good)
    {
        $good->update($request->all());
        foreach ($request->all()['remains'] as $remainData) {
            $good->remains()->updateOrCreate($remainData);
        }
        foreach ($request->all()['properties'] as $propertyData) {
            GoodProperty::query()->updateOrCreate($propertyData);
            $good->properties()->updateOrCreate($propertyData);
        }
        return $good;
    }

    public function delete(Good $good)
    {
        return $good->delete();
    }
}
