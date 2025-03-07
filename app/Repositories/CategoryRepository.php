<?php

namespace App\Repositories;

use App\Interfaces\CategoryInterface;
use App\Models\Faculty;

class CategoryRepository implements CategoryInterface{
    
    //Faculty
    public function getSearchFaculty(string $term)
    {
        return Faculty::where([['name', 'LIKE', '%' . $term . '%']])->where('deleted_at', 1)
        ->get();
    }
    public function listAllFaculties()
    {
        return Faculty::latest()->where('deleted_at', 1)->get();
    }
    public function findFacultyById($id)
    {
        return Faculty::findOrFail($id);
    }
}

