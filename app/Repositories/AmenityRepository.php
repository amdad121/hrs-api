<?php

namespace App\Repositories;

use App\Models\Amenity;

class AmenityRepository implements AmenityRepositoryInterface
{
    /**
     * @return \App\Models\Amenity[]|\LaravelIdea\Helper\App\Models\_IH_Amenity_C
     */
    public function getAll()
    {
        return Amenity::latest()->get();
    }

    /**
     * @param  array  $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return Amenity::create($attributes);
    }

    /**
     * @param $id
     * @return \App\Models\Amenity|\App\Models\Amenity[]|\LaravelIdea\Helper\App\Models\_IH_Amenity_C
     */
    public function getById($id)
    {
        return Amenity::findOrFail($id);
    }

    /**
     * @param $id
     * @param  array  $attributes
     * @return int
     */
    public function update($id, array $attributes): int
    {
        return Amenity::whereId($id)->update($attributes);
    }

    /**
     * @param $id
     * @return void
     */
    public function delete($id)
    {
        Amenity::destroy($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function validated($request)
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);
    }
}
