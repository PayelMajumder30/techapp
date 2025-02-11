<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AdmissionForm;


class IndexController extends Controller
{
    public function formView(Request $request)
    {
        // Get filter inputs
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $keyword = $request->input('keyword');

        $query = AdmissionForm::query();

        // Apply date filters using correct `when()` syntax
        $query->when($start_date && $end_date, function ($q) use ($start_date, $end_date) {
            $q->where('created_at', '>=', $start_date)
                ->where('created_at', '<=', $end_date);
        });

        // Apply keyword search
        $query->when($keyword, function ($q) use ($keyword) {
            $q->where(function ($subquery) use ($keyword) {
                $subquery->where('name', 'like', '%'.$keyword.'%')
                    ->orWhere('dob', 'like', '%'.$keyword.'%')
                    ->orWhere('class', 'like', '%'.$keyword.'%')
                    ->orWhere('mobile', 'like', '%'.$keyword.'%')
                    ->orWhere('email', 'like', '%'.$keyword.'%')
                    ->orWhere('pincode', 'like', '%'.$keyword.'%')
                    ->orWhere('utm_source', 'like', '%'.$keyword.'%')
                    ->orWhere('utm_medium', 'like', '%'.$keyword.'%')
                    ->orWhere('utm_campaign', 'like', '%'.$keyword.'%')
                    ->orWhere('utm_term', 'like', '%'.$keyword.'%')
                    ->orWhere('utm_content', 'like', '%'.$keyword.'%');
            });
        });

        // Execute the query and paginate results
        $admissionform = $query->simplePaginate(2);

        return view('admission.index', compact('admissionform'));
    }
}
