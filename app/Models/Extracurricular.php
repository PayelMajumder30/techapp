<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extracurricular extends Model
{
    use HasFactory;
    protected $table = "extra_curriculars";
    //protected $fillable = ['id', 'title', 'desc', 'image'];
}
