<?php
namespace App\Controllers;

use App\Core\Session;

class Error
{
    /**
     * @param $message \Exception
     */
    public function index($message)
    {
        echo $message->getMessage();
    }
}