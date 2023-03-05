<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TasksResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => (string) $this->id,
            'attributes' => [
                'name'        => $this->name,
                'description' => $this->description,
                'state'       => $this->state,
                'priority'    => $this->priority,
                'duration'    => $this->duration,
                'stratDate'   => $this->start_date,
                'endDate'     => $this->end_date
            ],
            'relationships' => [
                'id'         => $this->user->id,
                'user name'  => $this->user->name,
                'user email' => $this->user->email
            ]
        ];
    }
}
