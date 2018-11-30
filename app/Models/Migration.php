<?php
namespace App\Models;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

class Migration
{
    public static function migration()
    {
        Capsule::schema()->dropIfExists('files');
        Capsule::schema()->create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url');
            $table->integer('user_id')->unsigned();
        });

//        Capsule::schema()->table('files', function (Blueprint $table) {
//            $table->foreign('user_id')->references('id')->on('users');
//        });

        $faker = \Faker\Factory::create('ru_RU');
        for ($i = 0; $i < 10; $i++) {
            $file = new File();
            $file->user_id = $faker->numberBetween(1, 10);
            $file->url = $faker->image(PUBLIC_PATH . '/userfile');
            $file->save();
        }

        Capsule::schema()->dropIfExists('users');
        Capsule::schema()->create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->integer('age');
            $table->string('avatar')->default('');
            $table->string('description')->default('');
        });

        $faker = \Faker\Factory::create('ru_RU');
        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->name = $faker->name;
            $user->email = $faker->email;
            $user->age = $faker->numberBetween(1, 55);
            $user->password = $faker->password();
            $user->avatar = $faker->image(PUBLIC_PATH . '/avatar');
            $user->description = '';
            $user->save();
        }

        Capsule::schema()->dropIfExists('categories');
        Capsule::schema()->create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('parent_id')->default(0);
            $table->string('description')->default('');
        });

        $faker = \Faker\Factory::create('ru_RU');
        for ($i = 0; $i < 10; $i++) {
            $cat = new Category();
            $cat->name = $faker->name;
            $cat->parent_id = $faker->numberBetween(0, 2);
            $cat->description = '';
            $cat->save();
        }

        Capsule::schema()->dropIfExists('items');
        Capsule::schema()->create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('category_id')->default(0);
            $table->float('price');
            $table->string('description')->default('');
        });

        $faker = \Faker\Factory::create('ru_RU');
        for ($i = 0; $i < 10; $i++) {
            $item = new Item();
            $item->name = $faker->name;
            $item->category_id = $faker->numberBetween(1, 10);
            $item->price = $faker->numberBetween(100, 1000);
            $item->description = '';
            $item->save();
        }

        echo 'успешно';
    }
}
