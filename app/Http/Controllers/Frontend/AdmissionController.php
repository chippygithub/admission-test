<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\AdmissionFormRequest;
use App\Models\Admission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdmissionController extends Controller
{
    public function getForm(){
        return view('frontend.admission-form');
    }
    public function submitForm(AdmissionFormRequest $request){

        $admission = new Admission();
        $admission->fill($request->all());
        if ($request->hasFile('mark_sheet')) {
            $file = $request->file('mark_sheet');

            $filename = 'file_' . time() . rand(0, 1000) . '.' .  $file->extension();
            $path = Storage::disk()->putFileAs('mark_sheet', $file, $filename);
            $admission->mark_sheet = $path;
        }
        $admission->save();
        return redirect()->back()->with('message',"This is Success Message");

    }
    public function checkAdmissionStatus(){
        return view('frontend.admission-status');
    }
    public function admissionStatus(Request $request){

        $admissionData =  Admission::where('email',$request->email)->first();

        if($admissionData){

            return response()->json(['success' => true, 'result' => $admissionData]);

        }else{

            return response()->json(['success' => false, 'result' => 'No data found.Please register']);

        }

    }
}
