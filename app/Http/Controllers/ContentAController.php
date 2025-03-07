<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class ContentAController extends Controller
{
    //
    public function settings()
    {
        //$settings = Setting::pluck('content', 'title'); // Fetch settings as key-value pairs
        $settings = Setting::all();
        return view('admin.setting', compact('settings'));
    }

    public function settingsUpdate(Request $request){
       
        $request->validate([
            'official_phone1'           => 'required|integer|digits:10',
            'official_phone2'           => 'required|integer|digits:10',
            'official_email'            => 'required|email|min:5|max:255',
            'website_link'              => 'required|min:5|max:255',
            'full_company_name'         => 'required|string|min:1|max:255',
            'pretty_company_name'       => 'required|string|min:1|max:255',
            'company_short_desc'        => 'required|string|min:5|max:1000',
            'company_full_address'      => 'required|string|min:5|max:1000',
            'google_map_address_link'   => 'required|string|min:5',
        ]);

        settings::where('title', 'official_phone1')->update([
            'content' => $request->official_phone1
        ]);
        settings::where('title', 'official_phone2')->update([
            'content' => $request->official_phone2
        ]);
        settings::where('title', 'official_email')->update([
            'content' => $request->official_email
        ]);
        settings::where('title', 'full_company_name')->update([
            'content' => $request->full_company_name
        ]);
        settings::where('title', 'pretty_company_name')->update([
            'content' => $request->pretty_company_name
        ]);
        settings::where('title', 'company_short_desc')->update([
            'content' => $request->company_short_desc
        ]);
        settings::where('title', 'company_full_address')->update([
            'content' => $request->company_full_address
        ]);
        settings::where('title', 'google_map_address_link')->update([
            'content' => $request->google_map_address_link
        ]);
        settings::where('title', 'website_link')->update([
            'content' => $request->website_link
        ]);

        return redirect()->back()->with('success', 'Content updated');
    }
}
