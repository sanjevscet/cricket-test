<?php

namespace App\Repositories;

use Illuminate\Container\Container as Application;


class TeamRepository extends BaseRepository
{

    public function __construct(Application $app)
    {
        parent::__construct($app);
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return \App\Team::class;
    }

    // get list will the records
    public function getList()
    {
        return parent::find();
    }


    // show the record with the given id
    public function show($id)
    {
        return parent::find(['id' => $id], 'players');
    }

    // create a new record in the database
    public function create($request)
    {
        return parent::create($request);
    }

   // update record in the database
    public function update($request, $id)
    {
        return parent::update($request, $id);
    }
}
