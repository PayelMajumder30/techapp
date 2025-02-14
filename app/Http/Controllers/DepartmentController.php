<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Models\StudentClass;
use App\Models\Facilities;
use App\Interfaces\DepartmentInterface;


class DepartmentController extends Controller
{
    //  
    public function __construct(DepartmentInterface $DepartmentRepository){
        $this->DepartmentRepository = $DepartmentRepository;
    }
    //class
    public function createClass(Request $request){
        $student = StudentClass::orderBy('name', 'ASC')->where('status', 1)->where('deleted_at', 1)->get();
        return view ('class.create')->with(['student' => $student]);;
    }
    public function storeClass(Request $request){
        DB::beginTransaction();
        $request -> validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('student_classes', 'name')->where('deleted_at',1),
            ],
            
           
        ]);
        try{
            $data = new StudentClass;
            $data->name = $request->name;
            $data->save();
            DB::commit();
            return redirect()->route('class.index')->with('success', 'New class added');
        }catch(\Exception $e){
            DB::rollback();
            \Log::error($e);
            return back()->back()->with('failure', 'Failed to create new class, please try again');
        }
    } 

    public function classList(Request $request){
        if(!empty($request->keyword)){
            $data = $this->DepartmentRepository->getSearchClass($request->keyword);
        }else{
            $data = $this->DepartmentRepository->listAllClass();
        }
        return view('class.index', compact('data'));
    }

    public function classStatus(Request $request, $id){
        $data = $this->DepartmentRepository->findClassById($id);
        $data->status = ($data->status==1) ? 0 : 1;
        $data->update();
        return response()->json([
            'status' => 200,
            'message'=> 'Status updated',
        ]);
    }

    public function editClass($id){
        $data = $this->DepartmentRepository->findClassById($id);
        return view('class.edit', compact('data'));
    }

    public function updateClass(Request $request){
        //dd($request->all());
        DB::beginTransaction();

        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('student_classes', 'name')->ignore($request->id),
            ],
        ]);

        try {
            $data = StudentClass::findOrFail($request->id);
            $data->name = $request->name;            
            $data->save();
            // Commit the transaction if everything is successful
            DB::commit();
            return redirect()->route('class.index')->with('success', 'Class updated successfully');
        } catch (\Exception $e) {
           
            DB::rollback();
            
            // You can log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to update Class. Please try again.');
        }
    }

    public function destroyClass(Request $request, $id){
        DB::beginTransaction();
        try {
            $data = StudentClass::findOrFail($id);
            $data->deleted_at = 0;
            $data->save();
            DB::commit();
            return redirect()->route('admin.class.list.all')->with('success', 'Class deleted');
        } catch (\Exception $e) {
            DB::rollback();
            // Log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to delete Class. Please try again.');
        }
    }

    //facilities

    public function createFacility(Request $request){
        return view('facilities.create');
    }

    public function storeFacility(Request $request){
        DB::beginTransaction();
        $request->validate ([
            'title'         => [
                'required',
                'string',
                'max:255',
                Rule::unique('facilities', 'title')->where('deleted_at',1),
            ],
            'description'   => 'required|string',
            'logo'          => 'required|mimes:jpg,jpeg,png,gif,svg,webp|max:1000',
            'image'         => 'required|mimes:jpg,jpeg,png,gif,svg,webp|max:1000',
        ]);
        try{
            $newFacilities = new Facilities;
            $newFacilities->title    = $request->title;
            $newFacilities->desc     = $request->description;
            //Facility logo
            if ($request->hasFile('logo')) {
                $fileLogo = $request->file('logo');
                $fileLogoName = time() . rand(10000, 99999) . '.' . $fileLogo->getClientOriginalExtension();
                $fileLogo->move(public_path('uploads/facility'), $fileLogoName);
                // Store the full path of the uploaded file
                $newFacilities->logo = 'uploads/facility/' . $fileLogoName;
            }
            //Facility Image
            if($request->hasFile('image')){
                $fileImage = $request->file('image');
                $fileImageName = time() . rand(10000, 99999). '.' . $fileImage->getClientOriginalExtension();
                $fileImage->move(public_path('uploads/facility'), $fileImageName);
                $newFacilities->image = 'uploads/facility/' . $fileImageName;
            }
            $newFacilities->save();
            DB::commit();
            return redirect()->route('facilities.index')->with('success'.'New Facility added');
        }
        catch(\Exception $e){
            DB::rollback();
            \Log::error($e);
            return redirect()->back()->with('failure', 'Failed to create Facility. Please try again.');           
        }
    }

    public function facilityList(){
        if(!empty($request->keyword)){
            $facilities = $this->DepartmentRepository->getSearchFacility($request->keyword);
        }else{
            $facilities = $this->DepartmentRepository->listAllFacility();
        }
        return view('facilities.index', compact('facilities'));
    }
    public function editFacility($id)
    {
        $facilities = $this->DepartmentRepository->findFacilityById($id);
        return view('facilities.edit', compact('facilities'));
    }
    public function updateFacility(Request $request)
    {
        DB::beginTransaction();

        $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('facilities', 'title')->ignore($request->id),
            ],
            'description'=>[
                'required',
                'string',
            ],
            'logo'=>[
                'mimes:jpg,jpeg,png,gif,svg,webp',
                'max:1000'
                
            ],
            'image'=>[
                'mimes:jpg,jpeg,png,gif,svg,webp',
                'max:1000'
            ],
        ]);

        try {
            $facilities = Facilities::findOrFail($request->id);
            $facilities->title = $request->title;
            $facilities->desc = $request->description;
            //logo update
            if ($request->hasFile('logo')) {
                $fileLogo = $request->file('logo');
                $fileLogoName = time() . rand(10000, 99999) . '.' . $fileLogo->getClientOriginalExtension();
                $fileLogo->move(public_path('uploads/facility'), $fileLogoName);
            
                // Store the full path of the uploaded file
                $facilities->logo =  'uploads/facility/' . $fileLogoName;
            } else {
                $facilities->logo = $request->old_facility_logo;
            }
            // Image update
            if ($request->hasFile('image')) {
                $fileImage = $request->file('image');
                $fileImageName = time() . rand(10000, 99999) . '.' . $fileImage->getClientOriginalExtension();
                $fileImage->move(public_path('uploads/facility'), $fileImageName);
                $facilities->image = 'uploads/facility/' . $fileImageName;
            } else {
                $facilities->image = $request->old_facility_image;
            }            
            $facilities->save();
            // Commit the transaction if everything is successful
            DB::commit();
            return redirect()->route('facilities.index')->with('success', 'Facility updated successfully');
        } catch (\Exception $e) {  
            return redirect()->back()->with('failure', 'Failed to update Facility. Please try again.');
        }
    }
    public function destroyFacility(Request $request, $id){
        DB::beginTransaction();
        try {
            $facilities = Facilities::findOrFail($id);
            $facilities->deleted_at = 0;
            $facilities->save();
            DB::commit();
            return redirect()->route('facilities.index')->with('success', 'Facilities deleted');
        } catch (\Exception $e) {
            DB::rollback();
            // Log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to delete Facilities. Please try again.');
        }
    }
}
