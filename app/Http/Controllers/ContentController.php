<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jobvacancy;
use App\Models\Subject;
use App\Models\Unit;
use App\Models\Post;
use App\Models\Career;
use App\Models\CareerExperience;
use App\Models\CarrerHigherStudies;
use App\Models\Lead;
use App\Models\SocialMedia;
use App\Models\SeoPage;
use App\Models\Setting;


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
        $subject    = Subject::latest()->where('deleted_at', 1)->where('status',1)->get();
        $unit       = Unit::latest()->where('deleted_at', 1)->where('status', 1)->get();
        $post       = Post::latest()->where('deleted_at', 1)->where('status', 1)->get();
        $vacancy    = Jobvacancy::where('slug', $slug)->first();
        if($vacancy){
            return view('front.content.career-form', compact('vacancy','subject','unit','post'));
        }else{
            return redirect()->back()->with('failure', 'Data not found!');
        }
    }



    public function RegisterFinalSubmit(Request $request){
        //dd($request->all());
        DB::beginTransaction();
        $lastCareer = Career::latest()->first();
        try{
            if($lastCareer){
                $lastRegistrationId = $lastCareer->registration_id;
                $lastSerial         = (int) substr($lastRegistrationId, strrpos($lastRegistrationId, '-')+1);
                $nextSerial         = $lastSerial +1;
                $newRegistrationId  = 'TIGWS-' . str_pad($nextSerial, 5, '0', STR_PAD_LEFT);
            }else{
                //If no previous data exists
                $newRegistrationId  = 'TIGWS-00001';
            }
            //step 1: Inset data into career table
            $career =  new Career();
            $career->registration_id        = $newRegistrationId;
            $career->job_id                 = $request->job_id;
            $career->name                   = $request->name;
            $career->email                  = $request->email;
            $career->phone                  = $request->phone;
            $career->father_name            = $request->father_name;
            $career->date_of_birth          = $request->date_of_birth;
            $career->gender                 = $request->gender;
            $career->marital_status         = $request->marital_status;
            $career->address                = $request->address;
            $career->landmark               = $request->landmark;
            $career->pincode                = $request->pincode;
            $career->city                   = $request->city;
            $career->dist                   = $request->dist;
            $career->state                  = $request->state;
            $career->country                = $request->country;
            $career->x_school_name          = $request->x_school_name;
            $career->x_board_name           = $request->x_board_name;
            $career->x_percentage           = $request->x_percentage;
            $career->x_passing_year         = $request->x_passing_year;
            $career->xii_school_name        = $request->xii_school_name;
            $career->xii_board_name         = $request->xii_board_name;
            $career->xii_percentage         = $request->xii_percentage;
            $career->xii_passing_year       = $request->xii_passing_year;
            //after_xii_qualification this tables will generate in loop so proceeds later
            $career->present_salary         = $request->present_salary;
            $career->expected_salary        = $request->expected_salary;
            $career->join_time              = $request->join_time;
            $career->know_anyone_at_tigs    = $request->knowanyone;
            $career->referrence_details     = ($request->knowanyone == "Yes") ? $request->referrence_details : "";
            $career->applied_post           = $request->applied_post;
            $career->unit_name              = $request->unit_name;
            $career->subject                = $request->subject;

            //Add more fields  as needed
            $career->save();

            //step 2:check and store image files
            $imageFields = [
                'aadhar_card_file',
                'pan_card_file',
                'resume_file',
                'signature',
                'x_admit_card',
                'image_file'
            ]; 
            $baseUploadPath = 'uploads/form';
            foreach($imageFields as $field){
                if($request->hasFile($field)){
                    $file   = $request->file($field);
                    //Generate random number
                    $randomNumber = mt_rand(10000000,99999999);
                    //Generate localtime
                    $localTime = now()->format('YmdHis');

                    //concatenate random number with localtime
                    $uniqueIdentifier = $localTime . $randomNumber;
                    //Get the original file extension
                    $extension = $file->getClientOriginalExtension();
                    //Generate the new filename with the original extension and random number
                    $fileName = $uniqueIdentifier . '.' . $extension;
                    $filePath = $file->move($baseUploadPath, $fileName);
                    //store the file path in the database
                    $career->$field = $filePath;

                }
            }
            $career->save();

            // Step 3: Insert data into the CareerExperience table
            if($request->has('experience_type') && $request->has('experience_duration')){
                $experienceTypes        = $request->experience_type;
                $experienceDurations    = $request->experience_duration;

                foreach($experienceTypes as $key => $type){
                    //create a new career experience instance
                    $careerExperience = new CareerExperience();
                    //set attributes
                    $careerExperience->career_id = $career->id;
                    $careerExperience->experience_type = $type;
                    $careerExperience->experience_duration = $experienceDurations[$key];
                    $careerExperience->save();
                }
            }

            if($request->has('after_xii_qualification')) {
                $after_xii_Qualifications           = $request->after_xii_qualification;
                $after_xii_Institute_names          = $request->after_xii_institute_name;
                $after_xii_Institute_boards         = $request->after_xii_institute_board;
                $after_xii_Institute_streams        = $request->after_xii_institute_stream;
                $after_xii_Institute_percentages    = $request->after_xii_institute_percentage;
                $after_xii_Institute_passing_years  = $request->after_xii_institute_passing_year;

                foreach ($after_xii_Qualifications as $key => $qualification){
                    //create a new higher qualification instance
                    $carrerHigherStudies = new CarrerHigherStudies();
                    //set attributes
                    $carrerHigherStudies->career_id = $career->id;
                    $carrerHigherStudies->after_xii_qualification           = $qualification;
                    $carrerHigherStudies->after_xii_institute_name          = $after_xii_Institute_names[$key];
                    $carrerHigherStudies->after_xii_institute_board         = $after_xii_Institute_boards[$key];
                    $carrerHigherStudies->after_xii_institute_stream        = $after_xii_Institute_streams[$key];
                    $carrerHigherStudies->after_xii_institute_percentage    = $after_xii_Institute_percentages[$key];
                    $carrerHigherStudies->after_xii_institute_passing_year  = $after_xii_Institute_passing_years[$key];
                    $carrerHigherStudies->save(); 
                }
            }

            //Commit the transaction if all steps succeed
            DB::commit();

            // Return a success response or redirect
            //FinalFormSubmitMail($career->id);
            //session(['registration_id' => career->registration_id]);
            return response()->json(['status'=>200, 'message' => 'Data inserted successfully', 'data'=>$career->registration_id]);
            //echo "data inserted";
        } catch(\Exception $e){
              // If an exception occurs, rollback the transaction
              DB::rollBack();
              // Log the error or handle it accordingly
              return response()->json(['error' => $e->getMessage()], 500);
              //echo "data failed to insert";
        }
    }

    public function contact(Request $request){
        $seo        = SeoPage::where('page', 'CONTACT')->first();
        $setting    = Setting::get();
        return view('front.contact', compact('seo', 'setting'));
    }

    public function contactEnquiry(Request $request){
        $data = new Lead;
        $data->full_name    = $request->full_name;
        $data->mobile_no    = $request->callback_number;
        $data->message      = $request->message;
        $data->save();
        if($data){
            return response()->json(['status'=>200, 'message' => 'Form  submitted successfully']);
        }else{
            return response()->json(['status'=>500, 'message' => 'Something went wrong please try again later']);
        }
    }


}
