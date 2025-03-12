<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Jobcategories;

class JobController extends Controller
{
    //
    public function createJob(){
        return view ('jobct.create');
    }
    public function storeJob(Request $request){
        $request->validate([
            'title' => 'required|string|max:255|unique:job_categories,title',
        ]);
        $job = Jobcategories::create([
            'title' =>$request->title,
        ]);
        if($job){
            //echo "success";
            return to_route('jobct.index')->with('success','job added successfully');
        }else{
            //echo "failed";
            return to_route('jobct.create')->with('error','Field is required');
        }
    }

    public function jobList(Request $request){
        $keyword = $request->input('keyword');
        $query = Jobcategories::query();

        $jobs = Jobcategories::orderby('id','DESC')
        ->when($keyword, function ($query) use ($keyword) {
            $query->where('title', 'like', '%'.$keyword.'%');
        })->get();
        return view ('jobct.index', compact('jobs'));
    }

    public function changeJobStatus(Request $request) {
        $data = Jobcategories::find($request->id);
        $status = $data->status == 1 ? 0 : 1;
        Jobcategories::where('id', $request->id)->update([
            'status' => $status,
        ]);
        return json_encode(['message' => 'Job status updated sucessfully']);
    }

    public function editJob($id){
        $job = Jobcategories::find($id);
        return view('jobct.edit')->with(['job'=>$job]);
    }

    public function updateJob(Request $request, $id){
        $job = Jobcategories::find($id);
        $request->validate([
           'title' => [
            'required',
            'string',
            'max:255',
            Rule::unique('job_categories', 'title')->ignore($id),
            ],
        ]);
        Jobcategories::where('id', $id)->update([
            'title' => $request->title,
        ]);

        return to_route('jobct.index', ['id' => $id])->with([
            'job' => $job,
            'success' => 'Jobs has been updated successfully',
        ]);
    }

    public function desrtroyJob($id){
        $job = Jobcategories::where('id',$id)->delete();
        if($job){
            return redirect()->route('jobct.index')->with('status','job deleted sucessfully');
        }else{
            return back()->with('error', 'please provide the valid credentials');
        }
    }
}
