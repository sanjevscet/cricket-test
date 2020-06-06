<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeamRequest;
use App\Repositories\TeamRepository;

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
        return $this->repository->getList();
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

       return $this->repository->update($request, $team);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        return $this->repository->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param int  $team
     * @return \Illuminate\Http\Response
     */
    public function show(int $team)
    {
        return $this->repository->show($team);
    }
}
