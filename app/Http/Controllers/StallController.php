<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StallController extends Controller
{
    /*采用引导方式，先进行用户注册， 然后进行信息完善*/
    public function append($id, $title, $addr, $introduction)
    {
        if (!DB::table('stall')->where('member_id', '=', $id)) {
            $stall_id = DB::table('stall')->insertGetId([
                'title' => $title,
                'member_id' => $id,
                'addr' => $addr,
                'introduction' => $introduction
            ]);
            $this->success(200, ["userId" => $stall_id], "注册成功");

        } else {
            $this->failure();
        }
    }

    public function createOrder($stallId, $orderName)
    {
        if ($this->isMemberExist($stallId)) {
            $orderId = DB::table("orders")->insertGetId([
                'to_id' => $stallId,]);
            if ($orderId > 0) {
                $this->success();
            }else{
                $this->failure();
            }
        } else {
            $this->failure();
        }
    }

    //
    public function create($title, $addr, $introduction, $mobile, $ownerName, $cardId)
    {
        if (!DB::table('members')->where('mobile', '=', $mobile)->exists()) {
            try {
                DB::beginTransaction();
                $member_id = DB::table('members')->insertGetId([
                    'name' => $ownerName,
                    'mobile' => $mobile,
                    'card_id' => $cardId,
                    'status' => 0,
                    'kind' => 2
                ]);
                $stall_id = DB::table('stall')->insertGetId([
                    'title' => $title,
                    'member_id' => $member_id,
                    'addr' => $addr,
                    'introduction' => $introduction
                ]);
                DB::commit();
                $this->success(200, ["userId" => $stall_id], "注册成功");
            } catch (\Exception $e) {
                DB::rollBack();
                $this->failure(400, [], $e);
            }
        } else {
            $this->failure();
        }

    }
}
