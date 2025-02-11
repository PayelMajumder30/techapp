<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Unit;

class UnitController extends Controller
{
    //
    public function createUnit(){
        return view('unit.create');
    }
    public function storeUnit(Request $request){     
        $request->validate([
            'title' =>'required|string|max:255|unique:units,title',
        ]);        
        $unit = Unit::create([
            'title' =>$request->title,
        ]);
        if($unit){
            //echo "success";
            return to_route('unit.index')->with('success','unit added successfully');
        }else{
            //echo "fail";
            return to_route('unit.create')->with('error','Field is required');
        }
    }

    public function unitList(Request $request){
        $keyword = $request->input('keyword');
        $query = Unit::query();

        $units = Unit::orderby('id','DESC')
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('title', 'like', '%'.$keyword.'%');
        })->get();
        return view('unit.index', compact('units'));
    }

    public function changeUnitStatus(Request $request) {
        $status = (int) $request->status == 1 ? 0 : 1;
        Unit::where('id', $request->id)->update([
            'status' => $status,
        ]);
        return json_encode(['message' => 'Unit status updated sucessfully']);
    }

    public function editUnit($id){
        $unit = Unit::find($id);
        return view('unit.edit')->with(['unit'=>$unit]);
    }
    public function updateUnit(Request $request, $id){
        $unit = Unit::find($id);
        $request->validate([
           'title' => [
            'required',
            'string',
            'max:255',
            Rule::unique('units', 'title')->ignore($id),
            ],
        ]);
        Unit::where('id', $id)->update([
            'title' => $request->title,
        ]);

        return to_route('unit.index', ['id' => $id])->with([
            'unit' => $unit,
            'success' => 'units has been updated successfully',
        ]);
    }

    public function destroyUnit($id){
        $unit = Unit::where('id',$id)->delete();
        if($unit){
            return redirect()->route('unit.index')->with('status','unit deleted sucessfully');
        }else{
            return back()->with('error', 'please provide the valid credentials');
        }
    }
}
