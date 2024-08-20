<?php

namespace App\Exceptions;

use App\Traits\ApiHelper;
use App\Traits\ApiResponser;
use Exception;

class ErrorException extends Exception
{
    use ApiResponser;

    public $message;

    public $code;

    public function __construct($message, $code = 400)
    {
        $this->message = $message;
        $this->code = $code;
    }

    public function render()
    {
        $data['message'] = $this->message;

        return $this->error($data, $this->code);
    }
}
