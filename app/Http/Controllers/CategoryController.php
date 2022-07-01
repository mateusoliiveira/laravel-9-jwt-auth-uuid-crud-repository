<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    protected $category;
    public function __construct(
      CategoryRepositoryInterface $category)
    {
       $this->category = $category;
    }

    public function index()
    {
       return $this->category->with('products')->get();
    }
    
    public function show($id)
    {
       return $this->category->with('products')->find($id);
    }

    public function store(CategoryRequest $request)
    {
       return $this->category->create($request->all());
    }

    public function update(CategoryRequest $request)
    {
      return $this->category->update($request->all());
    }

    public function destroy($id)
    {
       return $this->category->delete($id);
    }
}