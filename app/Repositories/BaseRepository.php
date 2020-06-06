<?php

namespace App\Repositories;

use \Illuminate\Database\Eloquent\Model;
use \Illuminate\Container\Container as Application;
use App\Library\BaseResponseModel;
use App\Library\Constants;


abstract class BaseRepository
{
    // model property on class instances
    protected $model;

    protected function __construct(Application $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    abstract protected function model();

    private function makeModel()
    {
        $model = $this->app->make($this->model());
        if (!$model instanceof Model) {
            throw new \InvalidArgumentException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }


    // Get all instances of model
    protected function all()
    {
        return $this->model->all();
    }

    // create a new record in the database
    protected function create($request)
    {
        $data = $request->only($this->model->getFillable());
        $result =  $this->model->create($data);

        return $this->getResponse($result);
    }

    // update record in the database
    protected function update($request, $id)
    {
        // dd($this->model->getFillable());
        $data = $request->only($this->model->getFillable());
        $record = $this->model->find($id);
        $result = $record->update($data);

        return $this->getResponse($result);
    }

    // remove record from the database
    protected function delete($id)
    {
        return $this->model->destroy($id);
    }

    // show the record with the given id
    protected function show($id)
    {
        $result =  $this->model->find($id);

        return $this->getResponse($result);
    }

    // Get the associated model
    protected function getModel()
    {
        return $this->model;
    }

    // Set the associated model
    protected function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    protected function find(array $where = [], $with = null)
    {
        if ($with) {
            $result = $this->model->with($with)->where($where)->get();
        } else {
            $result = $this->model->where($where)->get();
        }

        return $this->getResponse($result);
    }

    protected function getResponse($result, $message = '')
    {
        $errors = [];
        $status = true;
        if ($result) {
            $data = $result;
        } else {
            $status = false;
            $errors = ['invalid_entity' => Constants::Error];
        }

        return BaseResponseModel::response($message, $data, $errors, $status);
    }
}