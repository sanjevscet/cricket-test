<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PlayerRequest;
use App\Repositories\PlayerRepository;
use App\Library\BaseResponseModel;
use App\Library\Constants;

class PlayerController extends Controller
{


    protected $repository;

    public function __construct(PlayerRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $this->repository->update($request, $player);

        return BaseResponseModel::success(Constants::PlayerUpdated);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlayerRequest $request)
    {
        $this->repository->create($request);

        return BaseResponseModel::success(Constants::PlayerCreated);
    }

    /**
     * Display the specified resource.
     *
     * @param int  $player
     * @return \Illuminate\Http\Response
     */
    public function show(int $player)
    {
        $playerDetail = $this->repository->show($player);
        if ($playerDetail) {
            return BaseResponseModel::response(Constants::SuccessfullyFetched, $playerDetail);
        }

        return BaseResponseModel::response(Constants::ItemNotFound, null, ['id' => Constants::InvalidId]);
    }
}
