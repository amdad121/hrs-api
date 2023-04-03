<?php

namespace App\Repositories;

use App\Models\Room;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class RoomRepository implements RoomRepositoryInterface
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAll(): Collection
    {
        return Room::latest()->get()->map(function ($room) {
            return $this->format($room);
        });
    }

    /**
     * @param  array  $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        if (request()->hasFile('photo')) {
            $attributes['photo'] = request()->file('photo')->store('photos', 'public');
        }

        return Room::create($attributes);
    }

    /**
     * @param $id
     * @return array
     */
    public function getById($id): array
    {
        $room = Room::findOrFail($id);

        return $this->format($room);
    }

    /**
     * @param $id
     * @param  array  $attributes
     * @return bool
     */
    public function update($id, array $attributes): bool
    {
        $room = Room::findOrFail($id);

        if (request()->hasFile('photo')) {
            if ($room->photo) {
                Storage::delete($room->photo);
            }

            $attributes['photo'] = request()->file('photo')->store('photos', 'public');
        } else {
            $attributes['photo'] = $room->photo;
        }

        return $room->update($attributes);
    }

    /**
     * @param $id
     * @return int
     */
    public function delete($id): int
    {
        return Room::destroy($id);
    }

    /**
     * @param $attributes
     * @return mixed
     */
    public function validated($attributes)
    {
        $val = $attributes->_method == 'patch' ? 'nullable' : 'required';

        return $attributes->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => $val.'|image|mimes:jpg,png|max:2048',
            'size' => 'required|string|max:255',
            'maximum_occupancy' => 'required|numeric',
            'price' => 'required|numeric',
            // 'amenity_id' => 'required|numeric',
        ]);
    }

    /**
     * @param $room
     * @return array
     */
    public function format($room): array
    {
        return [
            'id' => $room->id,
            'name' => $room->name,
            'description' => $room->description,
            'photo' => config('app.url').Storage::url($room->photo),
            'size' => $room->size,
            'maximum_occupancy' => $room->maximum_occupancy,
            'price' => $room->price,
            'created_at' => $room->created_at,
            'updated_at' => $room->updated_at,
        ];
    }
}
