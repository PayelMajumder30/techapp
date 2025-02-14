<?php

 namespace App\Repositories;

 use App\Interfaces\DepartmentInterface;
 use App\Models\StudentClass;
 use App\Models\Facilities;


 class DepartmentRepository implements DepartmentInterface{

    //Departments or StudentClass
    public function getSearchClass(string $term){
        return StudentClass::where('name', 'LIKE', '%' . $term . '%')
                            ->where('deleted_at', 1)
                            ->get();
    }
    public function listAllClass(){
        return StudentClass::latest()->where('deleted_at', 1)->get();
    }
    public function findClassById($id){
        return StudentClass::findOrFail($id);
    }

    //Student failities
    public function getSearchFacility(string $term){
        return Facilities::where('name', 'LIKE', '%' . $term . '%')
                            ->where('deleted_at', 1)
                            ->get();
    }
    public function listAllFacility(){
        return Facilities::latest()->where('deleted_at', 1)->get();
    }
    public function findFacilityById($id){
        return Facilities::findOrFail($id);
    }

 }
 