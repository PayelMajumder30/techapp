<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Models\Extracurricular;
use App\Models\Gallery;
use App\Models\StudentClass;
use App\Models\Faculty;
use App\Interfaces\CategoryInterface;



class FacultyController extends Controller
{
    //
    public function __construct(CategoryInterface $CategoryRepository)
    {
        $this->CategoryRepository = $CategoryRepository;
    }
    public function curricularList(Request $request)
    {
        $curricular = Extracurricular::latest()->get();
        return view('extraCurricular.index', compact('curricular'));
    }
    public function createCurricular(Request $request){
        return view('extraCurricular.create');
    }
    public function storeCurricular(Request $request){
        DB::beginTransaction();
        $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
            ],
            'description' => 'required|string',
            'image' => 'required|mimes:jpg,jpeg,png,gif,svg|max:1000',
        ],[
            'image.max' => 'The image must not be greate than 1 MB.',       
        ]);
        $file = $request->file('image');
        $fileName = time() . rand(10000, 99999) . '.' . $file->getClientOriginalExtension(); // Generate unique filename
        $filePath = 'uploads/faculty/' . $fileName; // Construct full path
        $file->move(public_path('uploads/faculty/'), $fileName); // Move file to destination
        try {
            $curricular = new ExtraCurricular;
            $curricular->title = $request->title;
            $curricular->desc = $request->description;
            $curricular->image = $filePath;
            $curricular->save();
            // Commit the transaction if everything is successful
            DB::commit();
            return redirect()->route('extraCurricular.index')->with('success', 'New data created');
        }  catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // You can log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to create data. Please try again.');
        }
    }
    public function editCurricular($id){
        $curricular = ExtraCurricular::findOrFail($id);
        return view('extraCurricular.edit', compact('curricular'));
    }
    public function updateCurricular(Request $request){
        DB::beginTransaction();

        $request->validate([
            'title' => [
                'required',
                'string',
                'max:255'
            ],
            'description' => [
                'required',
                'string',
            ],
            
            'image' => [
                'mimes:jpg,jpeg,png,gif,svg',
                'max:1000',
            ],

        ],[
            'image.max' => 'The image must not be greater than 1MB.'
        ]);

        try {
            $curricular = ExtraCurricular::findOrFail($request->id);
            $curricular->title = $request->title;
            $curricular->desc = $request->description;
            if($request->image){
                $file = $request->file('image');
               
                $fileName = time() . rand(10000, 99999) . '.' . $file->getClientOriginalExtension(); // Generate unique filename
                $filePath = 'uploads/faculty/' . $fileName; // Construct full path
                $file->move(public_path('uploads/faculty/'), $fileName); // Move file to destination

            $curricular->image = $filePath;    
            }
            $curricular->save();
            // Commit the transaction if everything is successful
            DB::commit();
            return redirect()->route('extraCurricular.index')->with('success', 'Extra curricular updated successfully');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // You can log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to update Extra curricular. Please try again.');
        }
    }

    public function destroyCurricular($id){
        DB::beginTransaction();

        try {
            $curricular = ExtraCurricular::findOrFail($id);
            $curricular->delete();
            // Commit the transaction if the deletion is successful
            DB::commit();
            return redirect()->route('extraCurricular.index')->with('success', 'Data deleted');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // Log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to delete data. Please try again.');
        }
    }

    public function GalleryIndex(Request $request){
        $gallery = Gallery::latest()->get();
        return view ('galleries.index', compact('gallery'));
    }

    public function GalleryCreate(){
        return view('galleries.create');
    }
    public function GalleryStore(Request $request){
        //DB::beginTransaction();
        if($request->type == "image" && !$request->hasFile('file')){
            Session::flash('key', 'Please choose an image');
            return redirect()->route('galleries.create');
        }
        if($request->type == "video" && !$request->video_path){
            Session::flash('key', 'Please enter valid video URL path');
            return redirect()->route('galleries.create');
        }
        $gallery = new Gallery;
        if($request->type == "image"){
            $file       = $request->file('file');
            $fileName   = time() . rand(10000,99999).  '.' . $file->getClientOriginalExtension();
            $filePath   = 'uploads/faculty/' . $fileName;
            $file->move(public_path('uploads/faculty/'), $fileName);
            $gallery->image = $filePath;
        }else{
            $gallery->video = $request->video_path;
        }
        $gallery->save();
        return redirect()->route('galleries.index')->with('success','New data created');
    }

    public function GalleryEdit($id){
        $gallery = Gallery::findOrFail($id);
        return view('galleries.edit', compact('gallery'));
    }
    public function GalleryUpdate(Request $request){
        if ($request->type == "image" && !$request->hasFile('file')) {
            Session::flash('key', 'Please choose an image');
            return redirect()->back();
        }
        if ($request->type == "video" && !$request->video_path) {
            Session::flash('key', 'Please enter valid video URL path');
            return redirect()->back();
        }
        $gallery = Gallery::findOrFail($request->id);
        if($request->type=="image"){
            $file = $request->file('file');
            $fileName = time() . rand(10000, 99999) . '.' . $file->getClientOriginalExtension(); // Generate unique filename
            $filePath = 'uploads/faculty/' . $fileName; // Construct full path
            $file->move(public_path('uploads/faculty/'), $fileName); // Move file to destination
            $gallery->image = $filePath;
            $gallery->video = null;
        }else{
            $gallery->video = $request->video_path;
            $gallery->image = null;
        }
        $gallery->save();
        return redirect()->route('galleries.index')->with('success', 'New data created');
    }

    public function GalleryDelete($id){
        DB::beginTransaction();

        try {
            $curricular = Gallery::findOrFail($id);
            $curricular->delete();
            // Commit the transaction if the deletion is successful
            DB::commit();
            return redirect()->route('galleries.index')->with('success', 'Data deleted');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // Log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to delete data. Please try again.');
        }
    }

    //Faculty
    public function FacultyIndex(Request $request){
        if(!empty($request->keyword)){
            $faculty = $this->CategoryRepository->getSearchFaculty($request->keyword);
        } else{
            $faculty = $this->CategoryRepository->listAllFaculties();
        }
        return view('faculty.index', compact('faculty'));
    }

    public function FacultyCreate(Request $request)
    {
        $class = StudentClass::where('status', 1)->where('deleted_at', 1)->get();
        return view('faculty.create', compact('class'));
    }
    public function FacultyStore(Request $request)
    {
        DB::beginTransaction();
        $request->validate([
            'name' => 'required|string|max:255|unique:faculties,name',
            'designation' => 'required|string|max:255',
            'description' => 'required|string',
            'class_name' => 'required|string',
            'pic' => 'required|mimes:jpg,jpeg,png,gif,svg|max:1000'

        ], [
            'pic.max' => 'The image must not be greater than 1MB.',
        ]);
        $file = $request->file('pic');
        $fileName = time() . rand(10000, 99999) . '.' . $file->getClientOriginalExtension(); // Generate unique filename
        $filePath = 'uploads/faculty/' . $fileName; // Construct full path
        $file->move(public_path('uploads/faculty/'), $fileName); // Move file to destination
        try {
            $data = new Faculty;
            $data->name = $request->name;
            $data->class_name = $request->class_name;
            $data->designation = $request->designation;
            $data->description = $request->description;
            $data->facebook_link = $request->facebook_link;
            $data->twitter_link = $request->twitter_link;
            $data->linkedin_link = $request->linkedin_link;
            $data->image = $filePath;
            $data->save();
            // Commit the transaction if everything is successful
            DB::commit();
            return redirect()->route('faculty.index')->with('success', 'New faculty created');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            dd($e->getMessage());
            DB::rollback();
            // You can log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to create faculty. Please try again.');
        }
    }

    public function FacultyDelete($id){
        DB::beginTransaction();

        try {
            $curricular = Faculty::findOrFail($id);
            $curricular->delete();
            // Commit the transaction if the deletion is successful
            DB::commit();
            return redirect()->route('faculty.index')->with('success', 'Data deleted');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // Log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to delete data. Please try again.');
        }
    }

    public function FacultyStatus($id){
        DB::beginTransaction();

        try{
            $data = Faculty::findOrFail($id);
            $data->status = $data->status == "1" ? "0" : "1";
            $data->save();
            DB::commit();
            return response()->json([
                'status'    => 200,
                'message'   => 'status updated',
            ]);
        }
        catch(\Exception $e){
            DB::rollback();
            return response()->json([
                'status'    => 400,
                'message'   => 'Failed to update status, try again',
            ]);
        }
    }

    public function FacultyEdit($id){
        $class      = StudentClass::where('status', 1)->where('deleted_at', 1)->get();
        $faculty    = $this->CategoryRepository->findFacultyById($id);
        return view('faculty.edit', compact('class','faculty'));
    }
    public function FacultyUpdate(Request $request){
        DB::beginTransaction();
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('faculties','name')->ignore($request->id),
            ],
            'designation' => [
                'required',
                'string',
                'max:255'
            ],
            'description' => [
                'required',
                'string'
            ],
            'class_name' => [
                'required',
                'string'
            ],
            'pic' => [
                'mimes:jpg,jpeg,png,gif,svg',
                'max:1000',
            ],
        ],[
            'pic.max' => 'The image must not be greater than 1MB.'
        ]);
        try{
            $faculty = Faculty::findOrFail($request->id);
            $faculty->name          = $request->name;
            $faculty->class_name    = $request->class_name;
            $faculty->designation   = $request->designation;
            $faculty->description   = $request->description;
            $faculty->facebook_link = $request->facebook_link;
            $faculty->twitter_link  = $request->twitter_link;
            $faculty->linkedin_link = $request->linkedin_link;
            if($request->pic){
                $file       = $request->file('pic');
                $fileName   = time(). rand(10000,99999).'.'.$file->getClientOriginalExtension();
                $filePath   = 'uploads/faculty/' . $fileName;
                $file->move(public_path('uploads/faculty/'), $fileName);

                $faculty->image = $filePath; 
            }else{
                $faculty->image = $request->old_faculty_img;
            }
            $faculty->save();
            DB::commit();
            return redirect()->route('faculty.index')->with('success','Faculty updated successfully');
        }
        catch(\Exception $e){
            DB::rollback();
            \Log::error($e);
            return redirect()->back()->with('failure','Failed to update faculty. Please try again.');
        }
    }
   
}
