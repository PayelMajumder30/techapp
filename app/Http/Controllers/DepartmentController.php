<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Models\StudentClass;
use App\Models\Facilities;
use App\Models\SubFacilities;
use App\Models\TeachingProcess;
use App\Models\Chooseus;
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
            $newFacilities->title  = $request->title;
            $newFacilities->slug   = slugGenerate($request->title, 'facilities');
            $newFacilities->desc   = $request->description;
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
    public function facilityStatus($id)
    {
        DB::beginTransaction();
    
        try {
        $facilities = Facilities::findOrFail($id);
        $facilities->status = !$facilities->status;
        $facilities->save();
        DB::commit();
        return response()->json([
        'status' => 200,
        'message' => 'Status updated',
        ]);
        } catch (\Exception $e) {
        DB::rollback();
        return response()->json([
        'status' => 400,
        'message' => 'Failed to update facility, try again',
        ]);
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

    public function FacilityView(Request $request, $id){
        if(!empty($request->keyword)){
            $subfacility = $this->DepartmentRepository->getSearchSubfacility($request->keyword);
        }else{
            $subfacility = $this->DepartmentRepository->listAllSubfacilities();
        }
        return view('facilities.view', compact('subfacility','id'));       
    }
    

    public function subfacilityCreate($id){
        //dd($id);
        return view('sub_facilities.create', compact('id'));
    }

    public function SubfacilityStore(Request $request){
    //    dd($request->all());
        DB::beginTransaction();
        $request->validate([
            'facility_id'  => 'required|exists:facilities,id',
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
        ]);
        
        try {
            $subfacility = new SubFacilities();
            $subfacility->title = $request->title;
            $subfacility->desc = $request->description;
            $subfacility->facility_id = $request->facility_id;
            $subfacility->save();
            // Commit the transaction if everything is successful
            DB::commit();
            return redirect()->route('facilities.view', ['id' => $request->facility_id])->with('success', 'New SubFacility created');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
           
            DB::rollback();  
            // You can log the exception if needed
            \Log::error($e);
             //dd($e->getMessage());
            // Redirect back with an error message
            //return redirect()->back()->with('failure', 'Failed to create SubFacility. Please try again.');
        }
    }
    public function SubfacilityStatus(Request $request, $id){
        DB::beginTransaction();
    
        try {
            $subfacilities = SubFacilities
            ::findOrFail($id);
            $subfacilities->status = !$subfacilities->status;
            $subfacilities->save();
            DB::commit();
            return response()->json([
            'status'    => 200,
            'message'   => 'Status updated',
        ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
            'status'    => 400,
            'message'   => 'Failed to update Subfacility, try again',
         ]);
        }
    }
   
    public function SubfacilityDelete(Request $request, $id)
    {   
        DB::beginTransaction();
        try {
            $subfacility = SubFacilities::findOrFail($id);
            $subfacility->deleted_at = 0;
            $subfacility->save();
            // Commit the transaction if the deletion is successful
            DB::commit();
            return redirect()->back()->with('success', 'Subfacility deleted');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // Log the exception if needed
            \Log::error($e);
            dd($e->getMessage());
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to delete SubFacility. Please try again.');
        }
    }
    public function SubfacilityEdit(){
        $subfacility = $this->DepartmentRepository->findFacilityById($id);
        return response()->json($data);
        return view('facilities.view', compact('subfacility'));
    }
    public function SubfacilityUpdate(Request $request){
        DB::beginTransaction();
        try {
            $subfacility = SubFacilities::findOrFail($request->id);
            $subfacility->title         = $request->SubFacility_title;
            $subfacility->desc          = $request->SubFacility_description;             
            $subfacility->facility_id   = $request->facility_id;             
            $subfacility->save();
            // Commit the transaction if everything is successful
            DB::commit();
            return redirect()->back()->with('success', 'SubFacility updated successfully');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // You can log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to update SubFacility. Please try again.');
        }
    }

    //teaching process
    public function TeachingList(){
        $teaching = TeachingProcess::latest()->get();
        return view('teaching_process.index',compact('teaching'));
    }

    public function TeachingCreate(Request $request){
        return view('teaching_process.create');
    }

    public function TeachingStore(Request $request){
        DB::beginTransaction();
        $request->validate([
            'title'         => 'required|string|max:255|unique:teaching_process,title',
            'description'   => 'required|string',
            'image'         => 'required|mimes:jpg,jpeg,png,gif,svg,webp|max:1000',
        ]);

        try{
            $teaching = new TeachingProcess();
            $teaching->title        = $request->title;
            $teaching->description  = $request->description;
            //image
            if($request->hasFile('image')){
                $fileteach          = $request->file('image');
                $fileImageName      = time() . rand(10000, 99999) . '.' . $fileteach->getClientOriginalExtension();
                $fileteach->move(public_path('uploads/teaching'), $fileImageName);
                $teaching->image    = 'uploads/teaching/' . $fileImageName;
            }
            $teaching->save();
            DB::commit();
            return redirect('teaching_process.index')->with('success', 'New process created');
        }
        catch(\Exception $e){
            DB::rollback();
            \Log::error($e);
            return redirect()->back()->with('failure', 'Failed to create process, Please try again');
        }
    }

    public function TeachingStatus($id)
    {
        DB::beginTransaction();
    
        try {
            $teaching = TeachingProcess::findOrFail($id);
            //$teaching->status = !$teaching->status;
            $teaching->status = $teaching->status == "1" ? "0" : "1"; 
            $teaching->save();
            DB::commit();
            return response()->json([
            'status' => 200,
            'message' => 'Status updated',
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            //dd($e->getMessage());
            return response()->json([
            'status' => 400,
            'message' => 'Failed to update status, try again',
            ]);
        }
    }

    public function TeachingDelete(Request $request, $id){
        DB::beginTransaction();
        try {
            $teaching = TeachingProcess::findOrFail($id);
            $teaching->delete();
            DB::commit();
            return redirect()->route('teaching_process.index')->with('success', 'Process deleted');
        } catch (\Exception $e) {
            DB::rollback();
            // Log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to delete Process. Please try again.');
        }
    }

    public function TeachingEdit($id){
        $teaching = TeachingProcess::findOrFail($id);
        return view('teaching_process.edit', compact('teaching'));
    }
    public function TeachingUpdate(Request $request){
        DB::beginTransaction();

        $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('teaching_process','title')->ignore($request->id),
            ],
            'description' => [
                'required',
                'string',
            ],
            'image' => [
                'mimes:jpg,jpeg,png,gif,svg,webp',
                'max:1000'
            ],
        ]);
        try{
            $teaching = TeachingProcess::findOrFail($request->id);
            $teaching->title        = $request->title;
            $teaching->description  = $request->description;
            if($request->hasFile('image')){
                $fileteach = $request->file('image');
                $fileImageName = time() . rand(10000,99999) . '.' . $fileteach->getClientOriginalExtension();
                $fileteach->move(public_path('uploads/teaching'),$fileImageName);

                $teaching->image = 'uploads/teaching/' . $fileImageName;
            }
            $teaching->save();
            DB::commit();
            return redirect()->route('teaching_process.index')->with('success', 'Process updated successfully');
        }
        catch(\Exception $e){
            DB::rollback();
            \Log::error($e);
            return redirect()->back()->with('failure', 'Failed to update process');
        }
    }

    //Why choose us
    public function ChooseUsIndex(Request $request){
        $keyword = $request->keyword ?? '';
        $query = Chooseus::query();
        
        if(!empty($keyword)){
            $query->where($keyword, function($q) use ($keyword) {
                $q->where('title', 'like', '%' . $keyword . '%')
                      ->orWhere('description', 'like', '%' . $keyword . '%')
                      ->orWhere('status', 'like', '%' . $keyword . '%');
            });
        }

    
        // Ensure it always returns a collection
        $choose = $query->latest()->get(); 
        return view('choose_us.index', compact('choose'));
    }
    

    public function ChooseUsStatus($id){
        DB::beginTransaction();

        try{
            $choose = Chooseus::findOrFail($id);
            $choose->status = $choose->status == "1" ? "0" : "1";
            $choose->save();
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

    public function ChooseUsCreate(){
        return view('choose_us.create');
    }

    public function ChooseUsStore(Request $request){
     
        $request->validate([
            'title'         =>'required|string|max:255|unique:why_choose_us,title',
            'description'   =>'required|string|min:1',
            'image'         =>'required|mimes:jpg,jpeg,png,gif,svg,webp|max:1000',
        ]);   
        
        DB::beginTransaction();
        try{
            $choose = new Chooseus;
            $choose->title          = $request->title;
            $choose->description    = $request->description;
            if ($request->hasFile('image')) {
                $file1 = $request->file('image');
                $fileImageName = time() . rand(10000, 99999) . '.' . $file1->getClientOriginalExtension();
                $file1->move(public_path('uploads/chooseus'), $fileImageName);
                // Store the full path of the uploaded file
                $choose->image =  'uploads/chooseus/' . $fileImageName;
            }
            $choose->save();
            // dd($choose);
            DB::commit();
            //dd($choose);
            return redirect()->back();
        }
        catch(\Exception $e){
            dd($e->getMessage());
            DB::rollback();
            // You can log the exception if needed
           
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to create data. Please try again.');
        }
    }

    public function ChooseUsEdit($id){
        $choose = Chooseus::findorFail($id);
        return view('choose_us.edit', compact('choose'));
    }

    public function ChooseUsUpdate(Request $request){
        DB::beginTransaction();

        $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('why_choose_us', 'title')->ignore($request->id),
            ],
            'description'=>[
                'required',
                'string',
            ],
            'image'=>[
                'mimes:jpg,jpeg,png,gif,svg,webp',
                'max:1000'
            ],
        ]);

        try {
            $choose = Chooseus::findOrFail($request->id);
            $choose->title = $request->title;
            $choose->description = $request->description;
            // Image update
            if ($request->hasFile('image')) {
                $file1 = $request->file('image');
                $fileImageName = time() . rand(10000, 99999) . '.' . $file1->getClientOriginalExtension();
                $file1->move(public_path('uploads/chooseus'), $fileImageName);

                // Store the full path of the uploaded image
                $choose->image = 'uploads/chooseus/' . $fileImageName;
            }             
            $choose->save();
            // Commit the transaction if everything is successful
            DB::commit();
            return redirect()->route('choose_us.index')->with('success', 'Data updated successfully');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // You can log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to update data. Please try again.');
        }
    }

    public function ChooseUsDelete(Request $request, $id){
        DB::beginTransaction();
        try {
            $teaching = Chooseus::findOrFail($id);
            $teaching->delete();
            DB::commit();
            return redirect()->route('choose_us.index')->with('success', 'Data deleted');
        } catch (\Exception $e) {
            DB::rollback();
            // Log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to delete Data. Please try again.');
        }
    }
   
}
