<?php

namespace App\Helpers;

use Exception;

class ExceptionHelper
{

    public static function show(Exception $e)
    {
        $exception = (object) array(
            "message" => $e->getMessage(),
            "code" => $e->getCode()
        );

        return $exception;
    }

}
