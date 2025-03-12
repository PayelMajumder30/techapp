<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Subject;

class SubjectController extends Controller
{
    //
    public function createSubject(){
        return view('subject.create');
    }

    public function storeSubject(Request $request){
        $request->validate([
            'title' => 'required|string|max:250|unique:subjects,title',
        ]);
        $subject = Subject::create([
            'title' =>$request->title,
        ]);
        if($subject){
            //echo "success";
            return to_route('subject.index')->with('success','subjects added successfully');
        }else{
            //echo "fail";
            return to_route('subject.create')->with('error','Field is required');
        }
    }
    public function subjectList(Request $request){
        $keyword = $request->input('keyword');
        $query = Subject::query();

        $subjects = Subject::orderby('id','DESC')
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('title', 'like', '%'.$keyword.'%');
        })->get();
        return view('subject.index', compact('subjects'));
    }

    public function changeSubStatus(Request $request) {
        $data = Subject::find($request->id);
        $status = $data->status == 1 ? 0 : 1;
        Subject::where('id', $request->id)->update([
            'status' => $status,
        ]);
        return json_encode(['message' => 'Subject status updated sucessfully']);
    }

    public function editSub($id){
        $subject = Subject::find($id);
        return view('subject.edit')->with(['subject'=>$subject]);
    }

    public function updateSub(Request $request, $id){
        $subject = Subject::find($id);
        $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('subjects', 'title')->ignore($id),
                ],
        ]);
        Subject::where('id', $id)->update([
            'title' => $request->title,
        ]);

        return to_route('subject.index', ['id' => $id])->with([
            'subject' => $subject,
            'success' => 'subjects has been updated successfully',
        ]);
    }

    public function destroySub($id){
        $subject = Subject::where('id',$id)->delete();
        if($subject){
            return redirect()->route('subject.index')->with('status','unit deleted sucessfully');
        }else{
            return back()->with('error', 'please provide the valid credentials');
        }
    }
}