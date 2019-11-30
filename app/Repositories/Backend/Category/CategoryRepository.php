<?php

namespace App\Repositories\Backend\Category;

use App\Category;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class CategoryRepository extends BaseRepository
{
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function all(){
        $categories = Category::all();
        return $categories;
    }
    public function delete($id)
    {
        $categories = Category::where('id', $id)->delete();
        return $categories;
    }
    public function create(array $data): Category
    {
        return DB::transaction(function () use ($data) {
            $category = $this->model::create([
                'name' => $data['name'],
                'slug' => $data['slug'],
            ]);
            if ($category) {
                return $category;
            }
            });
    }
}
