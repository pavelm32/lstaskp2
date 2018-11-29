<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $table = "users";
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'age', 'avatar', 'password', 'description'];
    public $timestamps = false;
}
