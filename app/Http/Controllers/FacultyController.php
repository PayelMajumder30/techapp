<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Models\Extracurricular;

class FacultyController extends Controller
{
    //

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
}
