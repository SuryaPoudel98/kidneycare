<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Patient;
use Illuminate\Support\Facades\File;


class ReportController extends Controller
{
    public function Addreport()
    {
        $patient=Patient::find(1);
        return view('dashboard.report.add-report',compact('patient'));
    }

    public function selectPropertiesToFront(Request $request)
    {


        $PID = \Request::get('PID');
        $mobile = \Request::get('NumberOfRecords');


        $data = \DB::select('select * from patients inner join reports on patients.id=reports.patient_id where reports.patient_id='.$PID.' ');
           

        return json_encode($data);
        // return json_encode(array(
        //     'name' => "surya", 'kam' =>"blabla"
        // ));
    }


    public function ReportStore(Request $request)
    { 
       

      
        $request->validate([
            'patient_id'=>'required',           
            // 'blood_sugar'=>'required',
            // 'blood_pressure'=>'required',
            // 'urine_albumin'=>'required',
            // 'document'=>'required',
            'report_date'=>'required',
           
            
        ]);

       $report = new Report();        
       $report->patient_id=$request->patient_id;
       $report->blood_sugar=$request->blood_sugar;
       $report->blood_pressure=$request->blood_pressure;
       $report->urine_albumin=$request->urine_albumin;
       $report->creatinine=$request->creatinine;
       $report->report_date=$request->report_date;    
       if($request->hasfile('document'))
         {
             $file=$request->file('document');
             $fileName=time().'.'.$file->extension();
             $file->move(public_path('/uploads/report'), $fileName);
                 
             $report->document=$fileName;
     

   
         }

      if($request->hasfile('optional_document'))
         {
             $file=$request->file('optional_document');
             $fileName=time().'.'.$file->extension();
             $file->move(public_path('/uploads/optional_document'), $fileName);                
             $report->optional_document=$fileName;     
         }      
         $query=$report->save();
         if($query)
         {       
        return back()->with('success','you have been successfully inserted report');

         }
         else 
         {
            return back()->with('fail','something went worng');

         }
        } 

         public function reports()
        {
            $reports=Report::all();
            
            return view('dashboard.report.all-report',compact('reports'));
        }

        public function EditReport($id)
        { 
        
            $report=Report::FindorFail($id);
            return view('dashboard.report.edit-report',compact('report'));
    
        }

        public function UpdateReport(Request $request)
       {       
        $report=Report::find($request->id);       
        $report->blood_sugar=$request->blood_sugar;
        $report->blood_pressure=$request->blood_pressure;
        $report->urine_albumin=$request->urine_albumin;
        $report->creatinine=$request->creatinine;

        $report->patient_id=$request->patient_id;
        $report->report_date=$request->report_date;    

        if($request->hasfile('document'))
        {
            $destination ='uploads/report/'.$report->document;
            if(File::exists($destination))
            { 
                File::delete($destination);

            }
            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/report/',$filename); 
            $report->document=$filename;

        } 
        if($request->hasfile('optional_document'))
        {
            $destination ='uploads/report/'.$report->optional_document;
            if(File::exists($destination))
            { 
                File::delete($destination);

            }
            $file = $request->file('optional_document');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/optional_document/',$filename); 
            $report->optional_document=$filename;

        } 

        $report->update();
        return back()->with('report_updated','Report details updated successfully is successfully updated');

       }

       public function DeleteReport($id)
       {
             $report=Report::find($id);
             $report->delete();
             return redirect()->back()->with('report_deleted','Report Post   deleted  successfully'); 
       }


        
        

   
}