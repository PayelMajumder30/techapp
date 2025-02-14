<?php

namespace App\Interfaces;

interface DepartmentInterface{
    //class
    public function getSearchClass(string $term);
    public function listAllClass();
    public function findClassById($id);

    //facility
    public function getSearchFacility(string $term);
    public function listAllFacility();
    public function findFacilityById($id);
}