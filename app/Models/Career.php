<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    protected $table = "Career";
    protected $fillable = ['id','name','state','created_at','upload_at'];
}
