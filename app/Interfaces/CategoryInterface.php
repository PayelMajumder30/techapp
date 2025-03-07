<?php

namespace App\Interfaces;

interface CategoryInterface {
    
    //Faculty
    public function listAllFaculties();
    public function findFacultyById($id);  
    public function getSearchFaculty(string $term);
}