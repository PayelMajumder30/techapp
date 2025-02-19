<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jobvacancy;
use App\Models\Subject;
use App\Models\Unit;
use App\Models\Post;


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
    public function confirmation(){
        return view('front.content.career-confirmation');
    }
    public function CareerApplicationForm($slug){
        $subject = Subject::latest()->where('deleted_at', 1)->where('status',1);
        $unit = Unit::latest()->where('deleted_at', 1)->where('status', 1);
        $post = Post::latest()->where('deleted_at', 1)->where('status', 1);
        $vacancy = Jobvacancy::where('slug', $slug)->first();
        if($vacancy){
            return view('front.content.career-form', compact('vacancy','subject','unit','post'));
        }else{
            return redirect()->back()->with('failure', 'Data not found!');
        }
    }
    
}
