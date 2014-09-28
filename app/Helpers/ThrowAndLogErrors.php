<?php namespace App\Helpers;


use Illuminate\Support\Facades\Log;

trait ThrowAndLogErrors {

    public function throw_and_log_error($message)
    {
        Log::debug($message);
        throw new \Exception($message);
    }
} 