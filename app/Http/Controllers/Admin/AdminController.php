<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Models\Admission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;


class AdminController extends Controller
{
    public function loginForm(){
        return view('admin.login-form');
    }
    public function submitForm(LoginRequest $request){

      
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password']
        ];
        if (Auth::attempt($credentials) ) {


            return redirect('student-list');
            

        }else{
            return redirect()->back()->with('error',"Invalid credentials");

        }

        
    }
    public function studentList(Request $request){

        if ($request->ajax()) {
            return $this->ajaxList();
        }
        return  view('admin.admission-list');

    }
    public function ajaxList()
    {
        $data = Admission::all();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('status', function($data){

                if($data->status == config('admission.status.active')){
                    return 'YES';
                }else{
                    return 'NO';

                }
            })
            ->addColumn('created_at', function($data){

                    return date('d M Y',strtotime($data->created_at));

            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function studentDetail($id){


        $data = Admission::whereId($id)->first();
        return view('admin.admission-detail', compact('data'));

    }
    public function updateAdmissionStatus($id){


        $data = Admission::whereId($id)->first();
        $data->status = config('admission.status.active');
        
        


            $studentLatitude = $data->latitude;
            $studentLongitude = $data->longitude;
    
            // School coordinates
            $schoolLatitude = config('admission.gps.school_latitude');
            $schoolLongitude = config('admission.gps.school_longitude');;
    
            // Calculate distance using Haversine formula
            $distance = $this->calculateDistance($studentLatitude, $studentLongitude, $schoolLatitude, $schoolLongitude);
    
            // Check if the student is within 2km radius
    
           if($distance <= config('admission.free_bus_fair_limit')){

            $data->is_free_bus_fair = config('admission.free_bus_fair_status.active');

           }else{
            $data->is_free_bus_fair = config('admission.free_bus_fair_status.inactive');

           }
           $saved = $data->save();
        if (!$saved) {
            return false;
        } else {
            return true;

        }


        

    }

    private function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        // Convert latitude and longitude from degrees to radians
        $lat1 = deg2rad($lat1);
        $lon1 = deg2rad($lon1);
        $lat2 = deg2rad($lat2);
        $lon2 = deg2rad($lon2);

        // Haversine formula
        $dlon = $lon2 - $lon1;
        $dlat = $lat2 - $lat1;
        $a = sin($dlat / 2) ** 2 + cos($lat1) * cos($lat2) * sin($dlon / 2) ** 2;
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = 6371 * $c; // Radius of Earth in kilometers
        return $distance;
    }
}
