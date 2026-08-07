<?php

namespace App\Repositories\Interfaces;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Supports\Collection;
interface SalesRepositoryInterface
{
    public function all(int $perpage= 10) : Paginator;
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function import($file);
}
