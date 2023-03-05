<?php

namespace App\Http\Controllers\Api\V1\Disease;

use App\Http\Controllers\Controller;
use App\Http\Requests\Disease\StoreDiseaseRequest;
use App\Http\Resources\DiseasesResource;
use App\Models\Disease;
use Illuminate\Http\Request;

class DiseasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DiseasesResource::collection(Disease::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiseaseRequest $request)
    {
        $request->validated($request->all());

        $disease = Disease::create([
            'name'        => $request->name,
            'description' => $request->description,
            'degree'      => $request->degree
        ]);

        return new DiseasesResource($disease);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Disease $disease)
    {
        return new DiseasesResource($disease);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disease $disease)
    {
        // $disease->delete();
        // return response(null, 204);
    }

}
