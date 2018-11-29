<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    public $table = "test";
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
    public $timestamps = false;
}
