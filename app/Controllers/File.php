<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Session;

class File extends Controller
{
    public function index()
    {
        $this->view->render('file_list', []);
    }

    public function load()
    {
        if (!Session::i()->get('login')) {
            header('Location: /user/');
        }

        $this->view->render('file_load', []);
    }
}