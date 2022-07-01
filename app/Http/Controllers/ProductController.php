<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductController extends Controller
{
    protected $product;
    public function __construct(
      ProductRepositoryInterface $product)
    {
       $this->product = $product;
    }

    public function index()
    {
       return $this->product->with('category')->get();
    }

    public function show($id)
    {
       return $this->product->with('category')->with('reviews')->find($id);
    }

    public function store(ProductRequest $request)
    {
       return $this->request->create($request->all());
    }

    public function update(ProductRequest $request)
    {
      return $this->product->update($request->all());
    }

    public function destroy($id)
    {
       return $this->product->delete($id);
    }
}