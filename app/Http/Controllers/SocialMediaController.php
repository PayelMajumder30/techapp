<?php

namespace App\Http\Controllers;
use App\Models\SocialMedia;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SocialMediaController extends Controller
{
    //
    public function index(Request $request){
        $keyword = $request->keyword ?? '';

        $query = SocialMedia::query();
        $query->when($keyword, function($query) use($keyword){
            $query->where('title', 'like', '%'. $keyword . '%');
        });
        $social = $query->latest('id')->simplePaginate(5);
        return view('social.index', compact('social'));
    }

    public function create(Request $request){
        return view('social.create');
    }
    public function store(Request $request){
       
        DB::beginTransaction();
        $request->validate([
            'title'         => 'required|string|max:255',
            'image'         => 'required|image|mimes:jpg,jpeg,png,webp,gif,svg|max:1000',
            'social_link'   => 'required|string',
            

        ], [
            'image.max'     => 'The image must not be greater than 1MB.',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image'); 
            $fileName = time() . rand(10000, 99999) . '.' . $file->getClientOriginalExtension();
            $filePath = 'uploads/social/' . $fileName;
            $file->move(public_path('uploads/social/'), $fileName);
        } else {
            return redirect()->back()->with('failure', 'Please upload a valid image.');
        }
        try {
            $social = new SocialMedia;
            $social->title = ucwords($request->title);
            $social->link   = $request->social_link;
            $social->image = $filePath;
            $social->save();
            // Commit the transaction if everything is successful
            DB::commit();
            return redirect()->route('social.index')->with('success', 'New Social media created');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            dd($e->getMessage());
            DB::rollback();
            // You can log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to create Social Media. Please try again.');
        }
    }

    public function delete($id){
        DB::beginTransaction();
        try{
            $social = SocialMedia::findOrFail($id);
            $social->delete();
            DB::commit();
            return redirect()->route('social.index')->with('success', 'Social media deleted');
        }
        catch(\Exception $e){
            DB::rollback();
            \Log::error($e);
            return redirect()->back()->with('failure', 'Failed to delete data. Please try again.');
        }
        
    }

    public function edit(Request $request, $id){
        $social = SocialMedia::findOrFail($id);
        return view('social.edit', compact('social'));
    }

    public function update(Request $request)
    {
    $request->validate([
    'title' => 'required|string|max:255',
    'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif,svg|max:1000',
    'social_link' => 'required|string',
    ],
    [
    'image.max' => 'the image must not be greater than 1 mb'
    ]);
   
    $social = SocialMedia::findOrFail($request->id);
    $social->title = ucwords($request->title);
    $social->link = $request->social_link;
   
    if ($request->hasFile('image')) {
    $path = $request->file('image')->store('social', 'public'); 
    $social->image = $path;
    }
    $social->save();
    return redirect()->route('social_media.index')->with('success','social media updated successfully');
    }
    
}
