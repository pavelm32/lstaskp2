<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Session;
use \App\Models\File as ModelFile;
use Intervention\Image\ImageManagerStatic as IImage;
use Symfony\Component\Filesystem\Filesystem;

class File extends Controller
{
    public function index()
    {
    }

    public function list()
    {
        if (!Session::i()->get('login')) {
            header('Location: /user/index/');
        }

        $user_id = Session::i()->get('user_id');

        $files = ModelFile::where('user_id', '=', $user_id)->get();

        $this->view->render('file_list', ['files' => $files]);
    }

    public function load()
    {
        if (!Session::i()->get('login')) {
            header('Location: /user/index/');
        }

        $this->view->render('file_load', []);
    }

    public function loadfile()
    {
        if (!Session::i()->get('login')) {
            header('Location: /user/index/');
        }

        $user_id = Session::i()->get('user_id');
        $file_name = $_FILES['file']['name'] ?? '';
        $file = $_FILES['file']['tmp_name'] ?? '';

        $fs = new Filesystem();

        if (!$fs->exists(PUBLIC_PATH . '/userfile/')) {
            $fs->mkdir(PUBLIC_PATH.'/userfile/');
        }

        $image_file = PUBLIC_PATH . '/userfile/' . $user_id . '_' . date('Ymd_hi') . '_' . $file_name ;
        $image = IImage::make($file)->save($image_file, 80);

        $file = ModelFile::create([
            'url' => $image_file,
            'user_id' => $user_id,
        ]);

        if ($file) {
            header('Location: /file/list/');
        } else {
            echo 'Файл не добавлен';
        }
    }
}