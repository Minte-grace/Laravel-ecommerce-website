<?php


namespace App\Repositories\Frontend\Category;
use App\Category;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository
{
    public function show()
    {
        $categories = Category::all();
        return $categories;
    }
    public function getById($id)
    {
        $category = Category::where('slug',$id)->first();
        return $category;
    }

}
