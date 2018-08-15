<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    //
    public function search($mobile = "", $name = "", $page = 0, $max = 20)
    {
        $members = DB::table("members")->where([
            ['mobile', 'like', '%' . $mobile . "%"],

        ])->orWhere(['name', 'like', '%' . $name . '%'])
            ->offset($page * $max)
            ->limit($max)
            ->get();
        if ($members) {
            $this->success(200, $members, "查询成功");
        }
    }
}
