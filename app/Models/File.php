<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public $table = "files";
    protected $primaryKey = 'id';
    protected $fillable = ['url', 'user_id'];
    public $timestamps = false;
}
