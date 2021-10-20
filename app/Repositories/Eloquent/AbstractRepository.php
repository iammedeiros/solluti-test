<?php

namespace App\Repositories\Eloquent;


abstract class AbstractRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->resolveModel();
    }

    //metodo que devolve a instância do model
    public function resolveModel() 
    {
        return app($this->model);
    }

    public function findAll() 
    {
        return $this->model->paginate(10);
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function store($values)
    {
        $this->model->create($values);
    }

    public function update($id, $values)
    {
        $data = $this->findById($id);
        $data->update($values);
    }

    public function destroy($id)
    {
        $id->delete();
    }
}
