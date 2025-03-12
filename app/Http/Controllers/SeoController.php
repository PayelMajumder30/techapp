<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeoPage;

class SeoController extends Controller
{
    //
    public function index(Request $request){
        $keyword    = $request->keyword ?? '';
        $query      = SeoPage::query();
        $query->when($keyword, function($query) use ($keyword){
            $query->where('page', 'like', '%' .$keyword.'%');
        });
        $seo = $query->paginate(10);
        return view('seo.index', compact('seo'));
    }

    public function detail(Request $request, $id){
        $seodetail = SeoPage::findOrFail($id);
        return view('seo.detail', compact('seodetail'));
    }

    public function edit(Request $request, $id){
        $seoedit = SeoPage::findOrFail($id);
        return view('seo.edit', compact('seoedit'));
    }

    public function update(Request $request){
        $request->validate([
            'id'            => 'required|integer',
            'page_title'    => 'nullable|string|min:1',
            'meta_title'    => 'nullable|string|min:1',
            'meta_desc'     => 'nullable|string|min:1',
            'meta_keyword'  => 'nullable|string|min:1'
        ]);
        $seoedit = SeoPage::findOrFail($request->id);

        $seoedit->page_title    = $request->page_title;
        $seoedit->meta_title    = $request->meta_title;
        $seoedit->meta_desc     = $request->meta_desc;
        $seoedit->meta_keyword  = $request->meta_keyword;
        $seoedit->save();

        return redirect()->route('seo.index')->with('success', 'SEO page details updated');
    }
    
}
