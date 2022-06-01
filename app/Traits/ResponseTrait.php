<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ResponseTrait
{
    /**
     * Phản hồi json thành công
     *
     * @param $msg
     * @return Response
     * **/
    public function success($msg)
    {
        return response()->json([
            'status' => true,
            'messages' => $msg
        ], Response::HTTP_OK);
    }

    /**
     * Phản hồi json thành công
     *
     * @param $msg
     * @return Response
     * **/
    public function fail($msg)
    {
        return response()->json([
            'status' => false,
            'messages' => $msg
        ], Response::HTTP_OK);
    }

    /**
     * Lỗi Internal Server Error 500
     *
     * @param $msg
     * @return Response
     * **/
    public function error500($msg)
    {
        return response()->json([
            'status' => false,
            'messages' => $msg
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Lỗi Bad Request 400
     *
     * @param $msg
     * @return Response
     * **/
    public function error400($msg)
    {
        return response()->json([
            'status' => false,
            'messages' => $msg
        ], Response::HTTP_BAD_REQUEST);
    }
}