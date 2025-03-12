<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachingProcess extends Model
{
    use HasFactory;
    protected $table = "teaching_process";
    protected $fillable = ['title', 'image', 'description', 'status'];
}
