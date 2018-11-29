<?php
/**
 * @var $users
 */

if ($users->count()) {
    ?>
    <a href="?order=<?=(!isset($_GET['order']) || $_GET['order'] == 'asc' ? 'desc' : 'asc')?>">Отсортировать по
        <?=(!isset($_GET['order']) || $_GET['order'] == 'asc' ? 'убыванию' : 'возрастанию')?></a>
    <ol>
        <?php
        foreach ($users as $user) {
            ?><li><?=$user->name?> (<?=$user->age?>) -
            <?=($user->age > 18 ? 'Совершеннолетний' : 'Несовершеннолетний')?>
            <a href="/user/editform/?user_id=<?=$user->id?>">Редактировать</a></li><?php
        }
        ?>
    </ol>

    <form action="/user/add/" method="post" enctype="multipart/form-data">
        <label>Имя<input type="text" name="name" value=""></label>
        <label>Пароль<input type="password" name="password"  value=""></label>
        <label>Возраст<input type="text" name="age" value=""></label>
        <label>Email<input type="text" name="email" value=""></label>
        <label>Аватар<input type="file" name="file"></label>
        <label>Описание
            <textarea name="description">
            </textarea>
        </label>
        <input type="submit" value="Добавить нового">
    </form>
    <?php
} else {
    echo 'Список пуст';
}