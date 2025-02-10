<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Suport\Facades\DB;
use App\Models\AdmissionForm;

class IndexController extends Controller
{
    //
   public function formView(){
    $admissionform = AdmissionForm::simplePaginate(2);
    return view('admission.index', compact('admissionform'));
   }
}
