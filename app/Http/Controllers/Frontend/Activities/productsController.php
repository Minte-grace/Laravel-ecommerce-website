<?php

namespace App\Http\Controllers;
use App\Repositories\Frontend\Category\CategoryRepository;
use App\Repositories\Frontend\Product\productRepo;
use Illuminate\Http\Request;

class productsController extends Controller
{
    /**
     * @var productRepo
     */
    protected $productRepo;
    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * productsController constructor.
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $products = $this->productRepo->mightName($slug);
        $mightAlsoLike = $this->productRepo->might($slug);

        return view('Frontend.Pages.product')->with([
            'product'=> $products,
            'mightAlsoLike' => $mightAlsoLike,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {

    }

}
