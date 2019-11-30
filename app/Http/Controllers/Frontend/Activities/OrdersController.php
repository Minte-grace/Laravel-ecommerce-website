<?php

namespace App\Http\Controllers;
use App\Repositories\Frontend\Orders\OrdersRepository;

class OrdersController extends Controller
{

    protected $ordersRepository;


    public function __construct(OrdersRepository $ordersRepository)
    {
        $this->ordersRepository = $ordersRepository;
    }
    public function index()
    {
       $orders = $this->ordersRepository->show();
       return view('Frontend.Pages.my-orders')->with('orders', $orders);

    }

    public function show($id)
    {
        $orders = $this->ordersRepository->view($id);
        return view('Backend.Pages.order-details')->with('order', $orders);
    }

    public function destroy($id)
    {
        $orders=$this->ordersRepository->delete($id);
        return  back()->with('success_message', "Order is deleted successfully!");

    }
}
