<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Repositories\Contracts\ReviewRepositoryInterface;

class ReviewController extends Controller
{
    protected $review;
    public function __construct(
      ReviewRepositoryInterface $review)
    {
       $this->review = $review;
    }

    public function store(ReviewRequest $request)
    {
      return $this->review->create($request->all());
   }

    public function update(ReviewRequest $request)
    {
      return $this->review->update($request->all());
    }

    public function show($id)
    {
       return $this->review->find($id);
    }

    public function destroy($id)
    {
       return $this->review->delete($id);
    }
}