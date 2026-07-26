<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

abstract class BaseCrudService
{
    protected Model $model;

    public function all($perPage = 10)
    {
        return $this->model
            ->latest()
            ->paginate($perPage);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function delete(Model $model)
    {
        return $model->delete();
    }
}