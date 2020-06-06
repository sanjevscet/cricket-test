<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeamRequest;
use App\Repositories\TeamRepository;
use App\Library\BaseResponseModel;
use App\Library\Constants;

class TeamController extends Controller
{


    protected $repository;

    public function __construct(TeamRepository $repository)
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
     * @param  int $team
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, int $team)
    {

        $this->repository->update($request, $team);

        return BaseResponseModel::success(Constants::TeamUpdated);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        $this->repository->create($request);

        return BaseResponseModel::success(Constants::TeamCreated);
    }

    /**
     * Display the specified resource.
     *
     * @param int  $team
     * @return \Illuminate\Http\Response
     */
    public function show(int $team)
    {
        $teamDetail = $this->repository->show($team);
        if ($teamDetail) {
            return BaseResponseModel::response(Constants::SuccessfullyFetched, $teamDetail);
        }

        return BaseResponseModel::response(Constants::ItemNotFound, null, ['id' => Constants::InvalidId]);
    }
}
