<?php

namespace App\Http\Controllers;

use App\Repositories\RoomRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoomController extends Controller
{
    private $roomRepository;

    /**
     * @param  \App\Repositories\RoomRepositoryInterface  $roomRepository
     */
    public function __construct(RoomRepositoryInterface $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Response
    {
        return $this->roomRepository->getAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): Response
    {
        $attributes = $this->roomRepository->validated($request);

        return $this->roomRepository->create($attributes);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): Response
    {
        return $this->roomRepository->getById($id);
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
        $attributes = $this->roomRepository->validated($request);

        return $this->roomRepository->update($id, $attributes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): Response
    {
        return $this->roomRepository->delete($id);
    }
}
