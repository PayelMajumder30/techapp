<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jobcategories;
use App\Models\Jobvacancy;

class JobvcController extends Controller
{
    //
    public function createJobvc(Request $request){
        $category = Jobcategories::orderBy('title', 'ASC')->where('status', 1)->where('deleted_at', 1)->get();
        //dd($category);
        return view('jobvc.create')->with(['category' => $category]);
    }
    public function storeJobvc(Request $request){
        DB::beginTransaction();
        $request->validate([
            'title'         => 'required|string|max:250|unique:job_vacancy,title',
            'sub_title'     => 'required|string|max:500',
            'school'        => 'required|string|max:500',
            'location'      => 'required|string|max:250',
            'category'      => 'required|string|max:255',
            'gender'        => 'required',
            'experience'    => 'required',
            'no_of_vacancy' => 'required',
        ]);

        try {
            $job = new Jobvacancy();
            $job->title         = $request->title;
            $job->sub_title     = $request->sub_title;
            $job->school_name   = $request->school;
            $job->location      = $request->location;
            $job->category_id   = $request->category;
            $job->gender        = $request->gender;
            $job->experience    = $request->experience;
            $job->no_of_vacancy = $request->no_of_vacancy;
            $job->save();
            DB::commit();
            return redirect()->route('jobvc.index')->with('success', 'Job created');
        } catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->with('failure', 'Failed to create job. Please try again.' .  $e->getMessage());
        }        
    }

    public function vacancyList(Request $request){
        $keyword = $request->input('keyword');
        $query = Jobvacancy::query();

        $query->when($keyword, function ($query) use ($keyword) {
            $query->where('title', 'like', '%'.$keyword.'%')
                ->orWhere('sub_title', 'like', '%'.$keyword.'%')
                ->orWhere('school_name', 'like', '%'.$keyword.'%')
                ->orWhere('location', 'like', '%'.$keyword.'%');
        })->get();
        $data = $query->latest('id')->where('deleted_at', 1)->paginate(2);
        return view ('jobvc.index', compact('data'));
    }

    public function changeVcStatus(){
        $data = Jobvacancy::find($request->id);
        $status = $data->status == 1 ? 0 : 1;
        Jobvacancy::where('id', $request->id)->update([
            'status' => $status,
        ]);
        return json_encode(['message' => 'Vacancy status updated sucessfully']);
    }

    
    public function editJob(Request $request, $id){
        $category = Jobcategories::orderBy('title', 'ASC')->where('status', 1)->where('deleted_at', 1)->get();
        $data = Jobvacancy::findOrFail($id);
        return view('jobvc.edit', compact('data','category'));
    }
    public function updateJob(Request $request){
        //dd($request);
        DB::beginTransaction();
        try{
            $request->validate([
                'title'         => 'required|string|max:250',
                'sub_title'     => 'required|string|max:500',
                'school'        => 'required|string|max:500',
                'location'      => 'required|string|max:250',
                'category'      => 'required|integer',
                'gender'        => 'required',
                'experience'    => 'required',
                'no_of_vacancy' => 'required',
            ]);
                $job = Jobvacancy::findOrFail($request->id);
                $job->title         = $request->title;
                $job->sub_title     = $request->sub_title;
                $job->school_name   = $request->school;
                $job->location      = $request->location;
                $job->category_id   = $request->category;
                $job->gender        = $request->gender;
                $job->experience    = $request->experience;
                $job->no_of_vacancy = $request->no_of_vacancy;
                $job->save();
                DB::commit();
                return redirect()->route('jobvc.index')->with('success', 'Job Update');
         
        } catch(\Exception $e){
            DB::rollback();
            //dd($e->getMessage());
            return redirect()->back()->with('failure', 'Failed to update job. Please try again.');
        }
    }

    public function desrtroyJob(Request $request, $id){
        DB::beginTransaction();
        try {
            $data = Jobvacancy::findOrFail($id);
            $data->deleted_at = 0;
            $data->save();
            // Commit the transaction if the deletion is successful
            DB::commit();
            return redirect()->route('jobvc.list')->with('success', 'Job deleted');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // Log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to delete Job. Please try again.');
        }
    }

}
