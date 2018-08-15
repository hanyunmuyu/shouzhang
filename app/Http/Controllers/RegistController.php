<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistController extends Controller
{
    //
    public function carrier($name, $mobile, $cardId = "无")
    {
        $this->regist($name, $mobile, $cardId);

    }

    public function manager($name, $mobile, $cardId = "无")
    {
        $this->regist($name, $mobile, $cardId);

    }

    public function stall($name, $mobile, $cardId = "无")
    {
        $this->regist($name, $mobile, $cardId);
    }

    private function regist($name, $mobile, $cardId, $kind = 0)
    {
        echo $name . $mobile . $cardId . $kind;
//
//        if (!DB::table("members")->where('mobile', $mobile)->exists()) {
//
//            $member_id = DB::table('members')->insertGetId([
//                'name' => $name,
//                'mobile' => $mobile,
//                'card_id' => $mobile,
//                'role_id' => $kind,
//                'status' => 0
//            ]);
//            echo $member_id;
//
//        } else {
//        }
    }
}
