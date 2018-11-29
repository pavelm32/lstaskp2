<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Session;
use App\Models\Migration;
use App\Models\User;

class Main extends Controller
{
    public function index()
    {
//        $this->view->render('main', [
//            'moredata' => 'indexMain real',
//            'users'    => User::all()->toArray()
//        ]);
       // print_r(Session::i()->get('user_id'));
    }

    public function migrate()
    {
        Migration::migration();
    }

    public function twig()
    {
       // $this->view->twigLoad('test', ['test' => 'asd', 'isTest' => true]);
    }
}