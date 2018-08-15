<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

define('SUCCESS_CODE', 200);
define('FAILURE_CODE', 400);
define('SUCCESS_MSG', "成功");
define('FAILURE_MSG', '失败');
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function success($status = 200, $body, $msg = "")
    {

        echo json_encode([
            'status' => $status,
            'body' => $body,
            'msg' => $msg
        ]);
    }

    protected function failure($status = 400, $body="", $msg="数据重复")
    {
        echo json_encode(['status' => $status,
            'body' => $body,
            'msg' => $msg]);

    }

    public function isMemberExist($memberId)
    {
        return DB::table("members")->where('id','=', $memberId)->exists();
    }

}


