<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Lead;

use Illuminate\Http\Request;

class LeadController extends Controller
{
    //
    public function index(Request $request){
    
        $keyword    = $request->keyword ?? '';
        $date       = $request->date ?? '';
        $query      = Lead::query();
    
        //search by keyword
        $query->when($keyword, function($query) use ($keyword){
        $query->where('full_name', 'like', '%'.$keyword. '%')
            ->orWhere('full_name', 'like', '%'.$keyword. '%')
            ->orWhere('mobile_no', 'like', '%'.$keyword. '%')
            ->orWhere('message', 'like', '%'.$keyword. '%');
        });

        //search by date
        $query->when($date, function($query) use ($date){
            $query->whereDate('created_at', '=', $date);
        });

   
        $lead = $query->latest('id')->paginate(25);
        return view('lead.index',compact('lead'));
    }

    public function export(Request $request){
        $keyword = $request->keyword ?? '';
        $date    = $request->date ?? '';
        $query   = Lead::query();

        $query->when($keyword, function($query) use($keyword){
        $query->where('full_name', 'like', '%'.$keyword.'%')
            ->orWhere('full_name', 'like', '%'.$keyword. '%')
            ->orWhere('mobile_no', 'like', '%'. $keyword . '%')
            ->orWhere('message', 'like', '%'. $keyword . '%');
        });

        $query->when($date, function($query) use ($date){
            $query->whereDate('created_at', '=', $date);
        });

        $lead = $query->latest('id')->get();
        if(count($lead) > 0){
            $delimiter = ",";
            $fileName  = "leads-".date('Y-m-d').".csv";
            //create a file pointer
            $f         = fopen('php://memory', 'w');
            //set column headers
            $fields    = array('Full Name', 'Mobile','Message', 'Date'); //After download the csv file column name is this
            fputcsv($f, $fields, $delimiter);

            $count = 1;
            foreach($lead as $key => $row){
                $mobile     = $row['mobile_no'];
                $lineData   = array(
                    $row['full_name'] ? $row['full_name'] : '',
                    $row['mobile_no'] ? $row['mobile_no'] : '',
                    $row['message'] ? $row['message'] : '',
                    date("d-m-Y h:i a",strtotime($row['created_at'])) ? date("d-m-Y h:i a",strtotime($row['created_at'])) : ''
                );
                fputcsv($f, $lineData, $delimiter);
                $count++;
            }

            // Move back to beginning of file
            fseek($f, 0);

            // Set headers to download file rather than displayed
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . $fileName . '";');

            //output all remaining data on a file pointer
            fpassthru($f);
        }
    }

    public function pdf(Request $request){
        $keyword    = $request->keyword ?? '';
        $date       = $request->date ?? '';
        $query      = Lead::query();

        $query->when($keyword, function($query) use($keyword){
            $query->where('full_name', 'like', '%'. $keyword .'%')
                ->orWhere('full_name', 'like', '%'. $keyword .'%')
                ->orWhere('mobile_no', 'like', '%'. $keyword .'%')
                ->orWhere('message', 'like', '%'. $keyword . '%');
        });

        $query->when($date, function($query) use ($date){
            $query->whereDate('created_at', '=', $date);
        });

        $leads = $query->latest('id')->get();

        if($leads->isEmpty()){
            return redirect()->back()->wiith('Failure', 'No data found to export');
        }
        $pdf = Pdf::loadView('lead.pdf',compact('leads'))->setPaper('a4', 'porttrait');

        return $pdf->download('leads-'.date('Y-m-d'). '.pdf');
    }
}
