<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobvacancy extends Model
{
    use HasFactory;
    protected $table = "job_vacancy";
    protected $fillable = ['title', 'sub_title', 'gender', 'experience', 'no_of_vacancy', 
    'school_name', 'location', 'category_id','status'];

    public function category(){
        return $this->belongsTo(Jobcategories::class, 'category_id', 'id');
    }
}
