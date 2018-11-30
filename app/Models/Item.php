<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $table = "items";
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'category_id', 'price', 'description'];
    public $timestamps = false;
}
