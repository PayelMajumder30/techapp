<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Jobcategories extends Model
{
    use HasFactory;
    protected $table = "job_categories";
    protected $fillable = ['title', 'status'];
}
