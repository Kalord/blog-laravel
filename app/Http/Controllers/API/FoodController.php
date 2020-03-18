<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Resources\FoodResource;
use App\Food;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($sex, $body_weight)
    {
        $set = Food::find([
            'sex'         => $sex,
            'body_weight' => $body_weight
        ]);

        if($set->isEmpty()) abort(404);
        return $set->toJson();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return FoodResource
     */
    public function show($id)
    {
        return new FoodResource(Food::findOrFail($id));
    }
}
