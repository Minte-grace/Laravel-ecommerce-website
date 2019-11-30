<?php

namespace App\Http\Controllers;
use App\Repositories\Frontend\Category\CategoryRepository;
use App\Repositories\Frontend\Product\productRepo;


class productsController extends Controller
{

    protected $productRepo;

    protected $categoryRepository;

    public function __construct(productRepo $productRepo, CategoryRepository $categoryRepository)
    {
        $this->productRepo = $productRepo;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        if (request()->category) {
            $products = $this->productRepo->filter();
            $categoryName = $this->categoryRepository->getById(request()->category)->name;
            $categories =$this->categoryRepository->show();
        } else {
            $products = $this->productRepo->show();
            $categories = $this->categoryRepository->show();
            $categoryName = 'Featured';
        }
        $products = $products->paginate(12);

        return view('Frontend.Pages.products')->with([
            'products' => $products,
            'categories' => $categories,
            'categoryName' => $categoryName,
        ]);
    }

    public function show($slug)
    {
        $products = $this->productRepo->mightName($slug);
        $mightAlsoLike = $this->productRepo->might($slug);

        return view('Frontend.Pages.product')->with([
            'product'=> $products,
            'mightAlsoLike' => $mightAlsoLike,
        ]);
    }

}
