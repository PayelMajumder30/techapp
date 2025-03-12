<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubFacilities extends Model
{
    use HasFactory;
    protected $table = "sub_facilities";
    protected $fillable = ['title', 'desc', 'facility_id'];
}
