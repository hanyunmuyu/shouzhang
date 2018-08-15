<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function createOrder($from, $price, $stallId = 0)
    {
        $orderId = DB::table("orders")->insertGetId([
            'from_id' => $from,
            'to_id' => $stallId,
            'price' => $price
        ]);
        if ($orderId) {
            $this->success();
        } else {
            $this->failure();
        }
    }

    /*
     * 查询关于stall的订单历史*/
    public function listOrder($page, $status = 0, $maxCount = 20)
    {
        DB::table("orders")
            ->join("stall", function ($join) {
                $join->on('orders.to_id', '=', 'stall.id');
            })
            ->offset($page * $maxCount)
            ->where('status', '=', $status)
            ->get();
    }
}
