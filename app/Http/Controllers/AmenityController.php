<?php

namespace App\Http\Controllers;

use App\Repositories\AmenityRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AmenityController extends Controller
{
    private $amenityRepository;

    public function __construct(AmenityRepositoryInterface $amenityRepository)
    {
        $this->amenityRepository = $amenityRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Response
    {
        return $this->amenityRepository->getAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): Response
    {
        $attributes = $this->amenityRepository->validated($request);

        return $this->amenityRepository->create($attributes);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): Response
    {
        return $this->amenityRepository->getById($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): Response
    {
        $attributes = $this->amenityRepository->validated($request);

        return $this->amenityRepository->update($id, $attributes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): Response
    {
        return $this->amenityRepository->delete($id);
    }
}
