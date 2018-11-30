<?php
/**
 * @var $categories
 */

if (!empty($categories)) {
    foreach ($categories as $category) {
        echo "<p>{$category['name']}" . (empty($category['items']) ? ' - нет товаров' : '') . "<p>";

        if (!empty($category['items'])) {
            echo "<ol>";
            foreach ($category['items'] as $item) {
                echo "<li>{$item['name']} ({$item['price']} руб) </li>";
            }
            echo "</ol>";
        }
    }
} else {
    echo '<p>Каталог пуст</p>';
}
