<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Extracurricular;
use App\Models\TeachingProcess;

class IndexeController extends Controller
{
    //
    public function extra_curricular(Request $request){
        $ExtraCurricular = Extracurricular::latest()->get();
        return view('front.curricular', compact('ExtraCurricular'));
    }
    public function teachingProcess(Request $request){
        $Teachingprocess = TeachingProcess::latest()->get();
        return view('front.teaching', compact('Teachingprocess'));
    }
}
