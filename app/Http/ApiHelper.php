<?php

namespace App\Http;

class ApiHelper
{
    /**
     * 响应助手
     * @param $data 响应数据
     * @param string $message 响应提示信息
     * @param string $status 响应状态
     * @param int $code 响应状态码
     * @return \Illuminate\Http\JsonResponse josn数据
     */
    static public function response($data, $message = '', $status = 'success', $code = 200)
    {
        return \Response::json([
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ]);
    }

    /**
     * 元数据数组
     * @param string $message
     * @param string $status
     * @param int $code
     * @return array
     */
    static public function metaArray($message = '', $status = 'success', $code = 200)
    {
        return [
            'status' => $status,
            'status_code' => $code,
            'message' => $message,
        ];
    }
}