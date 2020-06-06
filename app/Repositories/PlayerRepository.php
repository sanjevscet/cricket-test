<?php

namespace App\Repositories;

use App\Player;

use Illuminate\Container\Container as Application;

class PlayerRepository extends BaseRepository
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
        return Player::class;
    }

    // show the record with the given id
    public function show($id)
    {
        return parent::show($id);
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

//    // remove record from the database
    //    public function delete($id)
    //    {
    //        return $this->model->destroy($id);
    //    }


//    // Get the associated model
    //    public function getModel()
    //    {
    //        return $this->model;
    //    }

//    // Set the associated model
    //    public function setModel($model)
    //    {
    //        $this->model = $model;
    //        return $this;
    //    }

//    // Eager load database relationships
    //    public function with($relations)
    //    {
    //        return $this->model->with($relations);
    //    }
}
