<?php
/**
 * @var $files array
 */

if ($files->count()) {
    ?>
    <ol>
    <?php
    foreach ($files as $file) {
        ?>
        <li><?=$file->url?></li>
        <?php
    }
    ?>
    </ol>
    <?php
} else {
    echo 'Список пуст';
}
?>
