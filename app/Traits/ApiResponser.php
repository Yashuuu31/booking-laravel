<?php

namespace App\Traits;

trait ApiResponser
{
    public function success(array $data, int $code = 200)
    {
        return response()->json($data, $code);
    }

    public function error(array $data, int $code = 400)
    {
        return response()->json($data, $code);
    }
}