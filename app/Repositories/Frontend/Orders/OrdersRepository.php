<?php


namespace App\Repositories\Frontend\Orders;
use App\Order;

use App\Repositories\BaseRepository;

class OrdersRepository extends BaseRepository
{
    public function show()
    {
        $orders = auth()->user()->orders()->with('products')->get();
        return $orders;
    }
    public function view($id){
        $orders = Order::find($id);
        return $orders;
    }
    public function delete($id)
    {
        $orders= Order::where('id', $id)->delete();
        return $orders;
    }

}
