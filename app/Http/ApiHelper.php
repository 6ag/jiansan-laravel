<?php

namespace App\Http;

class ApiHelper
{
    /**
     * 格式化JSON格式
     * @param $data
     * @param string $message
     * @param int $code
     * @return array
     */
    static public function formatJson($data, $message = '', $code = 200)
    {
        return [
            'data' => $data,
            'message' => $message,
            'code' => $code,
        ];
    }
}