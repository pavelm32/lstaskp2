<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = "categories";
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'parent_id', 'description'];
    public $timestamps = false;
}
