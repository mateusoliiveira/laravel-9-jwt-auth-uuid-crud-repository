<?php 


namespace App\Repositories\Eloquent;

use App\Models\Review;
use App\Repositories\Contracts\ReviewRepositoryInterface;

class ReviewRepository extends AbstractRepository implements ReviewRepositoryInterface
{
    protected $model = Review::class;
}