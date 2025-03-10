<?php

namespace App\Http\Controllers;
use App\Models\Lead;

use Illuminate\Http\Request;

class LeadController extends Controller
{
    //
    public function index(Request $request){
        $keyword = $request->keyword ?? '';
        $query   = Lead::query();
        
        $query->when($keyword, function($query) use ($keyword) {
            $query->where('full_name', 'like'. '%' . $keyword. '%')
                ->orWhere('mobile_no', 'like' . '%' .$keyword. '%')
                ->orWhere('message', 'like' . '%' .$keyword. '%');
        });

        $lead = $query->latest('id')->simplePaginate(5);
        return view('lead.index', compact('lead'));
    }
}
