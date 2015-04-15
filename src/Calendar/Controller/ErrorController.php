<?php

// framework/src/Calendar/Controller/ErrorController.php

namespace Calendar\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\FlattenException;

class ErrorController
{
    public function exceptionAction(FlattenException $exception)
    {
        $msg = 'Что-то пошло не так! ('.$exception->getMessage().')';

        return new Response($msg, $exception->getStatusCode());
    }
}
