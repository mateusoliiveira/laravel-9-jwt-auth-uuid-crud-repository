<?php

namespace App\Repositories\Contracts;

interface ProductRepositoryInterface
{
    public function all();
    public function find($id);
    public function with($table);
    public function has($table);
    public function create($data);
    public function update($data);
    public function delete($id);

}