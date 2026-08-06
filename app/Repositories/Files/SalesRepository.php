<?php

namespace App\Repositories\Files;

use App\Models\Sale;
use App\Repositories\Interfaces\SalesRepositoryInterface;

class SalesRepository implements SalesRepositoryInterface
{
    protected $model;

    public function __construct(Sale $model)
    {
        $this->model = $model;
    }

    public function all()
    {
       $result = [];

       $this->model->chunk(100, function ($rows) use (&$result) {
            foreach ($rows as $row) {
                $result[] = $row;
            }
        });
        return $result;
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $model = $this->model->findOrFail($id);
        $model->update($data);
        return $model;
    }

    public function delete($id)
    {
        $model = $this->model->findOrFail($id);
        $model->delete();
        return $model;
    }
    
}
