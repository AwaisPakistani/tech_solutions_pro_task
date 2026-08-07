<?php

namespace App\Repositories\Files;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Supports\Collection;
use Illuminate\Support\Facades\Request as NewRequest;

use App\Models\Sale;
use App\Repositories\Interfaces\SalesRepositoryInterface;
use App\Imports\SalesImport;
use App\Jobs\UploadSalesRecords;
use Maatwebsite\Excel\Facades\Excel;
class SalesRepository implements SalesRepositoryInterface
{
    protected $model;

    public function __construct(Sale $model)
    {
        $this->model = $model;
    }

   public function all(int $perpage = 10) : Paginator
   {
        $search = NewRequest::input('search');

        $perpageRecords = NewRequest::input('perPage', $perpage);

        return $this->model
            ->newQuery()
            ->latest()
            ->when($search, fn ($query, $search) =>
                $query->search($search)
            )
            ->paginate($perpageRecords);
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

    public function import($file)
    {
        UploadSalesRecords::dispatch(
            $file->getRealPath()
        );

        return true;
    }

}
