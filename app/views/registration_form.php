<?php
/**
 * @var $is_authorized
 * @var $user
 */
?>
<?php
if (!$is_authorized) :
    ?>
<form action="/user/registration/" method="post" enctype="multipart/form-data">
    <label>Имя<input type="text" name="name"></label>
    <label>Пароль<input type="password" name="password"></label>
    <label>Возраст<input type="text" name="age"></label>
    <label>Email<input type="text" name="email"></label>
    <label>Аватар<input type="file" name="file"></label>
    <label>Описание
        <textarea name="description">

        </textarea>
    </label>
    <input type="submit" value="Отправить">
</form>

<form action="/user/auth/" method="post" enctype="multipart/form-data">
    <label>Email<input type="text" name="email"></label>
    <label>Пароль<input type="password" name="password"></label>
    <input type="submit" value="Авторизоваться">
</form>

    <?php
else :
    ?>
Здравствуйте, <?=$user?>. Вы авторизованы.
<a href="?logout=Y">Выйти</a>
    <?php
endif;
?>