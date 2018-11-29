<?php
namespace App\Controllers;

use App\Core\Session;
use GUMP;
use App\Core\Controller;
use Intervention\Image\ImageManagerStatic as IImage;
use App\Models\User as ModelUser;
use Symfony\Component\Filesystem\Filesystem;

class User extends Controller
{
    public function index()
    {
        if (isset($_GET['logout']) && $_GET['logout'] == 'Y') {
            Session::i()->clear();
        }
        $user = ModelUser::find(Session::i()->get('user_id'));
        $this->view->render('registration_form', ['is_authorized' => Session::i()->get('login') ?? false,
            'user' => $user->name ?? '']);
    }

    public function registration($create = false)
    {
        $name = $_POST['name'] ?? '';
        $password = $_POST['password'] ?? '';
        $age = $_POST['age'] ?? '';
        $email = $_POST['email'] ?? '';
        $file_name = $_FILES['file']['name'] ?? '';
        $file = $_FILES['file']['tmp_name'] ?? '';
        $description = $_POST['description'] ?? '';

        $user = ModelUser::where('email', '=', $email)->first();
        if ($user) {
            if ($user->id > 0) {
                echo 'Пользователь уже существует, авторизуйтесь';
                exit;
            }
        }

        $array = [
            'username' => $name,
            'password' => $password,
            'age' => $age,
            'email' => $email
        ];

        $result = GUMP::is_valid($array, [
            'username' => 'required',
            'password' => 'required',
            'age'      => 'required',
            'email'    => 'required'
        ]);

        if (is_array($result) && !empty($result)) {
            echo implode(' ', $result);
            exit;
        }

        $user = ModelUser::create([
            'name' => $name,
            'password' => password_hash($password, PASSWORD_ARGON2I),
            'email' => $email,
            'age' => $age,
            'description' => $description
        ]);

        if ($file_name || $file) {
            $fs = new Filesystem();

            if (!$fs->exists(PUBLIC_PATH . '/avatar/')) {
                $fs->mkdir(PUBLIC_PATH . '/avatar/');
            }

            $image_file = PUBLIC_PATH . '/avatar/' . $user->id . '_' . $file_name;
            $image = IImage::make($file)->save($image_file, 80);
            $user->avatar = $image_file;
            $user->save();
        }
        if (!$create) {
            Session::i()->set('login', 1);
            Session::i()->set('user_id', $user->id);

            header('Location: /user/index/');
        } else {
            header('Location: /user/list/');
        }
    }

    public function auth()
    {
        $password = $_POST['password'] ?? '';
        $email = $_POST['email'] ?? '';

        $user = ModelUser::where('email', '=', $email)->first();
        if ($user) {
            if ($user->id > 0) {
                if (password_verify($password, $user->password)) {
                    Session::i()->set('login', 1);
                    Session::i()->set('user_id', $user->id);
                    header('Location: /user/index/');
                } else {
                    echo 'не верный логин или пароль';
                    exit;
                }
            }
        } else {
            echo 'Зарегистрируйтесь сперва';
            exit;
        }
    }

    public function list()
    {
        $sort = 'age';
        $order = $_GET['order'] ?? 'asc';

        $users = ModelUser::orderBy($sort, $order)->get();

        $this->view->render('user_list', ['users' => $users]);
    }

    public function editform()
    {
        $user_id = $_GET['user_id'] ?? 0;

        if ($user_id <= 0) {
            echo 'Неверный пользователь';
            exit;
        }

        $user = ModelUser::find($user_id);

        $this->view->render('edit_form', ['user' => $user]);
    }

    public function edit()
    {
        $user_id = $_GET['user_id'] ?? 0;

        $name = $_POST['name'] ?? '';
        $password = $_POST['password'] ?? '';
        $age = $_POST['age'] ?? '';
        $email = $_POST['email'] ?? '';
        $file_name = $_FILES['file']['name'] ?? '';
        $file = $_FILES['file']['tmp_name'] ?? '';
        $description = $_POST['description'] ?? '';

        if ($user_id <= 0) {
            echo 'Неверный пользователь';
            exit;
        }

        $array = [
            'username' => $name,
            'password' => $password,
            'age' => $age,
            'email' => $email
        ];

        $result = GUMP::is_valid($array, [
            'username' => 'required',
            'password' => 'required',
            'age'      => 'required',
            'email'    => 'required'
        ]);

        if (is_array($result) && !empty($result)) {
            echo implode(' ', $result);
            exit;
        }

        $user = ModelUser::find($user_id);

        $user->name = $name;
        $user->password = password_hash($password, PASSWORD_ARGON2I);
        $user->email = $email;
        $user->age = $age;
        $user->description = $description;

        if ($file_name || $file) {
            $image_file = PUBLIC_PATH . '/avatar/' . $user->id . '_' . $file_name;

            $fs = new Filesystem();

            if (!$fs->exists($image_file)) {
                $image = IImage::make($file)->save($image_file, 80);
                $user->avatar = $image_file;
            }
        }

        $user->save();

        header('Location: /user/list/');
    }

    public function add()
    {
        $this->registration(true);
    }
}
