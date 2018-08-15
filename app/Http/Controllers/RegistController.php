<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistController extends Controller
{
    //
    public function carrier($name, $mobile, $cardId = "无")
    {
        $this->regist($name, $mobile, $cardId, 0);

    }

    public function manager($name, $mobile, $cardId = "无")
    {
        $this->regist($name, $mobile, $cardId, 1);

    }

    public function stall($name, $mobile, $cardId = "无")
    {
        $this->regist($name, $mobile, $cardId, 2);
    }

    private function regist($name, $mobile, $cardId, $kind = 0)
    {

        if (!DB::table("members")->where('mobile', $mobile)->exists()) {

            $member_id = DB::table('members')->insertGetId([
                'name' => $name,
                'mobile' => $mobile,
                'card_id' => $cardId,
                'status' => 0
            ]);

            $this->success(200, ['userId' => $member_id], '成功');
        } else {
            $this->failure(400, $mobile . "已经被注册", '失败');
        }
    }
}
