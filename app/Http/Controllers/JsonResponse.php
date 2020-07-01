<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/7/1 0001
 * Time: 下午 2:34
 */

namespace App\Http\Controllers;


trait JsonResponse
{

    private function jsonResponse($code, $message, $data = null)
    {
        $content = [
          'code'=>$code,
          'message'=>$message,
          'data'=>$data
        ];
        return response()->json($content)->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    public function jsonSuccess($data = null)
    {
        return $this->jsonResponse(1, 'success', $data);
    }

    public function jsonFail($message = 'fail')
    {
        return $this->jsonResponse(0, $message);
    }

}