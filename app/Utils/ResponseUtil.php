<?php


namespace App\Utils;

/*
 * For making uniformity type response
 */

class ResponseUtil
{
    public static function makeResponse($message, $data)
    {
        return [
            'status' => true,
            'data'    => $data,
            'message' => $message,
        ];
    }

    public static function makeError($message, array $data = [])
    {
        $res = [
            'status' => false,
            'message' => $message,
        ];

        if (!empty($data)) {
            $res['data'] = $data;
        }

        return $res;
    }

    public static function makeUnauthorized($message, array $data = [])
    {
        $res = [
            'status' => 'forbidden',
            'message' => $message,
        ];

        if (!empty($data)) {
            $res['data'] = $data;
        }

        return $res;
    }

    public static function makeValidationError($message, array $validation_message = [], array $data = [])
    {
        $res = [
            'status' => false,
            'message' => $message,
            'validation' => $validation_message
        ];

        if (!empty($data)) {
            $res['data'] = $data;
        }

        return $res;
    }
}
