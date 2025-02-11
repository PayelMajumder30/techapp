<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Suport\Facades\DB;
use App\Models\AdmissionForm;

class IndexController extends Controller
{
    //
    public function formView(Request $request){
        $query = AdmissionForm::query();
        $query->when(request('start_date') != '', function ($q) {
            return $q->where('created_at', '>=', date('Y-m-d', strtotime(request('start_date'))));
        });
        $query->when(request('end_date') != '', function ($q) {
            return $q->where('created_at', '<=', date('Y-m-d', strtotime(request('end_date'))));
        });
        $query->when(trim(request('keyword')) != '', function ($q) {
            return $q->where('name', 'like', request('keyword') . '%');
        });
        $admissionform = $query->simplePaginate(4);
        return view('admission.index', compact('admissionform'));
    }
}
