<?php

namespace App\Http\Controllers\Api\V1\Exercise;

use App\Http\Controllers\Controller;
use App\Http\Requests\Exercise\StoreExerciseRequest;
use App\Http\Resources\ExercisesResource;
use App\Models\Exercise;
use Illuminate\Http\Request;

class ExercisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ExercisesResource::collection(Exercise::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExerciseRequest $request)
    {
        $request->validated($request->all());

        $exercise = Exercise::create([
            'name'        => $request->name,
            'description' => $request->description,
            'body_part'   => $request->body_part,
            'repetitions' => $request->repetitions,
            'sets'        => $request->sets,
            'duration'    => $request->duration
        ]);

        return new ExercisesResource($exercise);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Exercise $exercise)
    {
        return new ExercisesResource($exercise);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exercise $exercise)
    {
        // $exercise->delete();
        // return response(null, 204);
    }
}
