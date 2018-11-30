<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Item;
use App\Models\Category;

class Catalog extends Controller
{
    public function index()
    {

    }

    public function list()
    {
        $categories_formated = [];
        $categories = Category::orderBy('cat_id', 'asc')->leftJoin('items', function ($join) {
            $join->on('items.category_id', '=', 'categories.id');
        })->get(array('*','categories.id as cat_id', 'categories.name as cat_name'));

        if ($categories->count()) {
            foreach ($categories as $category) {
                if (!isset($categories_formated[$category->cat_id])){
                    $categories_formated[$category->cat_id] = ['name' => $category->cat_name, 'items' => []];
                    if ($category->id > 0) {
                        $categories_formated[$category->cat_id]['items'][] =
                            ['name' => $category->name, 'price' => $category->price];
                    }
                } else {
                    if ($category->id > 0) {
                        $categories_formated[$category->cat_id]['items'][] =
                            ['name' => $category->name, 'price' => $category->price];
                    }
                }
            }
        }

        $this->view->render('item_list', ['categories' => $categories_formated]);
    }
}