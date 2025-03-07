<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Extracurricular;
use App\Models\TeachingProcess;
use App\Models\Chooseus;
use App\Models\Gallery;
use App\Models\Faculty;

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

    public function home(Request $request){
        $choice = Chooseus::latest()->get();
        $galry = Gallery::latest()->get();
        return view('front.home', compact('choice','galry'));
    }
    public function faculty(Request $request){
        $faculty = Faculty::latest()->get();
        return view('front.faculty', compact('faculty'));
    }
}
