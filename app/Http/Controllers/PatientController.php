<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    //
    public function Addpatient()
    {
        return view('dashboard.patient.add-patient');
    }

    public function PatientStore(Request $request)
    {                
    
        $request->validate([
            'name' => 'required',
            'address'=>'required',
            'phone_no'=>'required|unique:patients',
            'email'=>'email',
            'dob'=>'required',
                       
       
        

        ]);
            $patient = new Patient();
            $patient->name =$request->name;
            $patient->address =$request->address;
            $patient->phone_no =$request->phone_no;
            $patient->email =$request->email;
            $patient->dob =$request->dob;


            $patient->save();
        return redirect()->back()->with('patient_added','Patient detail  added successfully'); 

    }
    public function patients( Request $request)
    {
        if($request->phoneNumber!="")
        {
            $patients=Patient::all()->where("phone_no",$request->phoneNumber);
        }
        else
        {
            $patients=Patient::all();
        }

      //  $patients=Patient::all();
        return view('dashboard.patient.all-patient',compact('patients'));
    }
    public function searchpatient($phone)
    {
       
        return view('dashboard.patient.all-patient',compact('patients'));
    }
    public function EditPatient($id)
    { 
    
        $patient=Patient::FindorFail($id);
        return view('dashboard.patient.edit-patient', compact('patient'));

    }

    public function UpdatePatient(Request $request)
    {      
      
    
   
      $patient=Patient::find($request->id); 
      $patient->name =$request->name;
      $patient->address =$request->address;
      $patient->phone_no =$request->phone_no;
      $patient->email =$request->email;
      $patient->dob =$request->dob;
      $patient->update();
      return back()->with('patient_updated','Patient details updated successfully is successfully updated');

    }
    public function DeletePatient($id)
    {
        $patient = Patient::find($id);
        $patient->delete();
        return redirect()->back()->with('patient_deleted','Patients   deleted  successfully'); 
    }




}
