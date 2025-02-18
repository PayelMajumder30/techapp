<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jobvacancy;

class ContentController extends Controller
{
    //
    public function career(Request $request){
        $data = Jobvacancy::latest()->where('status', 1)->where('deleted_at', 1)->get();
        $uniquePosts = Jobvacancy::select('title')
                ->where('status', 1)
                ->where('deleted_at', 1)
                ->groupBy('title')
                ->pluck('title');

        $uniqueCategories = Jobvacancy::with('category')
                ->whereHas('category')               
                ->select('category_id')
                ->distinct()//remove duplicate id
                ->get();
        return view('front.content.career', compact('data', 'uniquePosts','uniqueCategories'));
    }
    
}
