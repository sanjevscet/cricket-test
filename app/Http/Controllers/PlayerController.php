<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PlayerRequest;
use App\Http\Requests\PlayerHistoryRequest;
use App\Repositories\PlayerRepository;
use App\Repositories\PlayerHistoryRepository;

class PlayerController extends Controller
{


    protected $repository;
    protected $historyRepository;


    public function __construct(PlayerRepository $repository, PlayerHistoryRepository $historyRepository)
    {
        $this->repository = $repository;
        $this->historyRepository = $historyRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->repository->getList();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $player
     * @return \Illuminate\Http\Response
     */
    public function update(PlayerRequest $request, int $player)
    {

       return $this->repository->update($request, $player);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlayerRequest $request)
    {
        return $this->repository->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param int  $player
     * @return \Illuminate\Http\Response
     */
    public function show(int $player)
    {
        return $this->repository->show($player);
    }

    public function storeOrUpdateHistory(PlayerHistoryRequest $request) {
       return $this->historyRepository->createOrUpdate($request);
    }
}
