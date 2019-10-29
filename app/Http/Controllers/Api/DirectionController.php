<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProductCollection;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Direction;
use App\Http\Resources\Direction as DirectionResource;
use App\Http\Resources\DirectionCollection;
use App\Http\Requests\DirectionRequest;

class DirectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return DirectionCollection
     */
    public function index()
    {
        return new DirectionCollection(Direction::all()->toHierarchy());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DirectionRequest  $request
     * @return DirectionResource
     */
    public function store(DirectionRequest $request)
    {
        $validated = $request->validated();

        $direction = Direction::create($validated);

        if(isset($validated['parent_id'])) {
            $root = Direction::findOrFail($validated['parent_id']);
            $direction->makeChildOf($root);
        }

        return new DirectionResource($direction);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return DirectionResource
     */
    public function show($id)
    {
        $direction = Direction::findOrFail($id);

        return new DirectionResource($direction);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DirectionRequest  $request
     * @param  int  $id
     * @return DirectionResource
     */
    public function update(DirectionRequest $request, $id)
    {
        $validated = $request->validated();

        $direction = Direction::findOrFail($id);
        $direction->fill($validated);
        $direction->save();

        if(isset($validated['parent_id'])) {
            $root = Direction::findOrFail($validated['parent_id']);
            $direction->makeChildOf($root);
        }

        return new DirectionResource($direction);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return DirectionResource
     */
    public function destroy($id)
    {
        $direction = Direction::findOrFail($id);
        $direction->delete();

        return new DirectionResource($direction);
    }

    /**
     * Display a listing of the products.
     *
     * @return ProductCollection
     */
    public function products($id)
    {
        $direction = Direction::findOrFail($id);

        return new ProductCollection($direction->products()->paginate());
    }
}
