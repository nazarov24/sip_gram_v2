<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $models = DB::table('model_has_roles')->where('model_type', 'App\Models\User')->where('model_id', $this->id)->get();

        foreach($models as $model) {
            $role = DB::table('roles')->find($model->role_id)->display_name;
        }

        return [
            'id' => $this->id ?? null,
            'first_name' => $this->first_name??null,
            'last_name' => $this->last_name??null,
            'role' => $role,
        ];
    }
}
