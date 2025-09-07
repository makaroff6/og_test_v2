<?php

namespace App\Http\Controllers;

use App\Http\Requests\GoodStoreRequest;
use App\Http\Resources\GoodsResource;
use App\Models\Good;

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
        return Good::query()->create($request->all());
    }

    public function delete(Good $good)
    {
        return $good->delete();
    }
}
