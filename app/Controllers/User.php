<?php
namespace App\Controllers;

use App\Core\Session;
use GUMP;
use App\Core\Controller;
use Intervention\Image\ImageManagerStatic as IImage;
use App\Models\User as ModelUser;

class User extends Controller
{
    public function index()
    {
        $this->view->render('registration_form', []);
    }

    public function registration()
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

        //var_dump($user);

        $image_file = PUBLIC_PATH . '/avatar/' . $user->id . '_' . $file_name;
        $image = IImage::make($file)->save($image_file, 80);
        $user->avatar = $image_file;
        $user->save();

        Session::i()->set('login', 1);
        Session::i()->set('user_id', $user->id);

        echo 'успех';
    }

    public function auth()
    {
        $password = $_POST['password'] ?? '';
        $email = $_POST['email'] ?? '';

        $user = ModelUser::where('email', '=', $email)->first();
        if ($user) {
            if ($user->id > 0) {
                Session::i()->set('login', 1);
                Session::i()->set('user_id', $user->id);
            }
        } else {
            echo 'Зарегистрируйтесь сперва';
        }
    }
}
