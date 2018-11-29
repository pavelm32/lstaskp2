<?php
/**
 * @var $user
 */

if ($user->count()) {
    ?>
    <form action="/user/edit/?user_id=<?=$user->id?>" method="post" enctype="multipart/form-data">
        <label>Имя<input type="text" name="name" value="<?=$user->name?>"></label>
        <label>Пароль<input type="password" name="password"  value="<?=$user->password?>"></label>
        <label>Возраст<input type="text" name="age" value="<?=$user->age?>"></label>
        <label>Email<input type="text" name="email" value="<?=$user->email?>"></label>
        <label>Аватар<input type="file" name="file"></label>
        <label>Описание
            <textarea name="description">
                <?=$user->description?>
            </textarea>
        </label>
        <input type="submit" value="изменить">
    </form>
    <?php
} else {
    echo 'Пользователь не найден';
}