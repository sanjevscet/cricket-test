<?php

namespace App\Repositories;




class TeamRepository extends BaseRepository
{
    // model property on class instances
    // protected $model;

    // Constructor to bind model to repo
    // public function __construct(Model $model)
    // {
    //     parent::__construct($app);
    // }

    // // Get all instances of model
    // public function all()
    // {
    //     return $this->model->all();
    // }


    public function __construct(\Illuminate\Container\Container $app)
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

    // create a new record in the database
    public function create($request)
    {
        // dd($request->input());
        return parent::create($request);
    }

//    // update record in the database
    //    public function update(array $data, $id)
    //    {
    //        $record = $this->find($id);
    //        return $record->update($data);
    //    }

//    // remove record from the database
    //    public function delete($id)
    //    {
    //        return $this->model->destroy($id);
    //    }

//    // show the record with the given id
    //    public function show($id)
    //    {
    //        return $this->model-findOrFail($id);
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
