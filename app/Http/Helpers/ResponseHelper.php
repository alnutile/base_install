<?php namespace App\Http\Helpers;


class ResponseHelper {

    public static function respond($data, $message)
    {
        return ['data' => $data, 'message' => $message];
    }
} 