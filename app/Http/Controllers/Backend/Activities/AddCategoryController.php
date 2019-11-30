<?php

namespace App\Http\Controllers;

use App\Repositories\Backend\Category\CategoryRepository;
use App\Http\Requests\Backend\CategoryRequest;

class AddCategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->middleware('auth:admin');
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        return view('Backend.Pages.add-category');
    }

    public function store(CategoryRequest $request)
    {
        $this->categoryRepository-> create($request->only([
             'name',
             'slug',
         ]));
        return  back()->with('success_message', "New Category is added  successfully!");
    }

    public function destroy($id)
    {
        $this->categoryRepository->delete($id);
        return  back()->with('success_message', "Category is deleted  successfully!");
    }

}
