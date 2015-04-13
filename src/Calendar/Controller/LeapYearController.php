<?php

// framework/src/Calendar/Controller/LeapYearController.php

namespace Calendar\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Calendar\Model\LeapYear;

class LeapYearController
{
    public function indexAction(Request $request, $year)
    {
        $leapyear = new LeapYear();
        if ($leapyear->isLeapYear($year)) {
            $response =  new Response('Да, это високосный год!'.rand());
        } else {
            $response = new Response('Нет, это не високосный год.');
        }

        $response->setTtl(10);

        return $response;
    }
}