<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdmissionForm;

class JobController extends Controller
{
    //
    public function filterApplication(Request $request){
        $start_date = $request->start_date ?? '';
        $end_date = $request->end_date ?? '';
        $keyword = $request->keyword ?? '';
        $query = AdmissionForm::query();

        $query = when($start_date && $end_date, function($query) use($start_date, $end_date){
            $query->where('created_at', '>=', $start_date)
                  ->where('created_at', '<=', $end_date);
        });

        $query = when($keyword, function($query) use ($keyword){
            return $query->where(function($q) use($keyword){
                $q->where('name', 'like', '%'.$keyword.'%')
                ->orwhere('dob', 'like', '%'.$keyword.'%')
                ->orwhere('class', 'like', '%'.$keyword.'%')
                ->orwhere('mobile', 'like', '%'.$keyword.'%')
                ->orwhere('email', 'like', '%'.$keyword.'%')
                ->orwhere('pincode', 'like', '%'.$keyword.'%')
                ->orwhere('utm_source', 'like', '%'.$keyword.'%')
                ->orwhere('utm_medium', 'like', '%'.$keyword.'%')
                ->orwhere('utm_campaign','like', '%'.$keyword.'%')
                ->orwhere('utm_term', 'like', '%'.$keyword.'%')
                ->orwhere('utm_content', 'like', '%'.$keyword.'%');
            });
        });
        dd($query);
        $admissionform = $query->latest('id')->paginate(3);
        return view('admission.index', compact('admissionform'));

    }

}
