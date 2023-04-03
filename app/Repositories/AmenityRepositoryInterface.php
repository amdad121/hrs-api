<?php

namespace App\Repositories;

interface AmenityRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @param  array  $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id);

    /**
     * @param $id
     * @param  array  $attributes
     * @return mixed
     */
    public function update($id, array $attributes);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @param $request
     * @return mixed
     */
    public function validated($request);
}
