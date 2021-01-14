<?php

namespace App\Http\Controllers\Portal\Staff\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Student\Payment;
use App\Models\Student\Registration;
use App\Models\Support\Bank;
use App\Models\Support\BankBranch;
use App\Models\Support\SlCity;
use App\Models\Support\SlDistrict;
use App\Models\Support\WorldCity;
use App\Models\Support\WorldCountry;
use App\Models\Support\WorldDivision;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('revalidate');
        $this->middleware('staff.auth');
    }
    //NEW APPLICANT
    public function Applications()
    {
        $registrations = Registration::where('registered_at', NULL)->where('application_submit', '1')->where('application_status', NULL)->get();
        return view('portal/staff/student/applications', compact('registrations'));
    }

    //NEW APPLICANT PAYMENT
    public function reviewRegPayment(){
        //$registrations = Registration::where('registered_at', NULL)->whereHas('payment', function ($query) {$query->where('status', NULL);})->get();
        $registrations = Registration::where('registered_at', NULL)->where('application_submit', '1')->where('payment_id', '!=', NULL)->where('payment_status', NULL)->get();
        return view('portal/staff/student/applications', compact('registrations'));
    }

    //GET APPLICANT INFO
    public function applicantInfo(Request $request)
    {
        $registration = Registration::find($request->registration_id);
        $student = Registration::find($request->registration_id)->student;
        $email = $student->user->email;
        $payment = NULL;
        if($registration->payment_id != NULL):
            $payment = $registration->payment;
            $bank = Bank::find($payment->bank_id);
            $bankBranch = BankBranch::find($payment->bank_branch_id);
            $payment = array('details'=>$payment,'bank'=>$bank,'bankBranch'=>$bankBranch);
        endif;
        
        //PERMANENT ADDRESS
        $permanentCountry = WorldCountry::where('id',$student->permanent_country_id)->first()->name;
        $permanentState = NULL;
        $permanentCity = NULL;
        //GET DIVISION OR DISTRICT
        if($student->permanent_state_id != NULL):
            if($student->permanent_country_id == 67):
                $permanentState = SlDistrict::find($student->permanent_state_id)->first()->name;
            else:
                $permanentState = WorldDivision::where('id',$student->permanent_state_id)->first()->name;
            endif;
        endif;

        //GET CITY
        if($student->permanent_city_id != NULL):
            if($student->permanent_country_id == 67):
                $permanentCity = SlCity::find($student->permanent_city_id)->first()->name;
            else:
                $permanentCity = WorldCity::where('id',$student->permanent_city_id)->first()->name;
            endif;
        endif;
        $permanentAddressDetails = array('permanentCountry'=>$permanentCountry, 'permanentState'=>$permanentState, 'permanentCity'=>$permanentCity);
        // /PERMANENT ADDRESS

        //CURRENT ADDRESS
        $currentCountry = NULL;
        $currentState = NULL;
        $currentCity = NULL;
        //GET COUNTRY
        if($student->current_country_id != NULL):
            $currentCountry = WorldCountry::where('id',$student->current_country_id)->first()->name;
        endif;
        //GET DIVISION OR DISTRICT
        if($student->current_state_id != NULL):
            if($student->current_country_id == 67):
                $currentState = SlDistrict::find($student->current_state_id)->first()->name;
            else:
                $currentState = WorldDivision::where('id',$student->current_state_id)->first()->name;
            endif;
        endif;

        //GET CITY
        if($student->current_city_id != NULL):
            if($student->current_country_id == 67):
                $currentCity = SlCity::find($student->current_city_id)->first()->name;
            else:
                $currentCity = WorldCity::where('id',$student->current_city_id)->first()->name;
            endif;
        endif;
        $currentAddressDetails = array('currentCountry'=>$currentCountry, 'currentState'=>$currentState, 'currentCity'=>$currentCity);
        // /CURRENT ADDRESS
        return response()->json(['status'=>'success', 'student'=>$student , 'registration'=>$registration, 'payment'=> $payment, 'email'=>$email, 'permanentAddressDetails'=>$permanentAddressDetails, 'currentAddressDetails'=>$currentAddressDetails]);
        
    }

    // APPLICATION
    public function approveApplication(Request $request){
        $registration = Registration::where('id', $request->registration_id);
        if($registration->update(['application_status'=> 'Approved'])):
            return response()->json([ 'status'=>'success']);
        endif;
        return response()->json([ 'status'=>'error']);
    }

    public function declineApplication(Request $request){
        $registration = Registration::where('id', $request->registration_id);
        if($registration->update(['registered_at'=> NULL, 'registration_expire_at'=>NULL, 'application_submit'=>0, 'application_status'=>'Declined', 'declined_msg'=>$request->declined_msg, 'status'=>NULL])):
            return response()->json([ 'status'=>'success']);
        endif;
        return response()->json([ 'status'=>'error']);
    }
    // /APPLICATION

    // PAYMENT
    public function approvePayment(Request $request){
        $registration = Registration::where('id', $request->registration_id);
        $payment = Payment::where('id', $registration->first()->payment_id);
        if($payment->update(['status'=>'Approved'])):
            if($registration->update(['payment_status'=>'Approved'])):
                return response()->json([ 'status'=>'success']);
            endif;
        endif;
        return response()->json([ 'status'=>'error']);
    }

    public function declinePayment(Request $request){
        $registration = Registration::where('id', $request->registration_id);
        $payment = Payment::where('id', $registration->first()->payment_id);
        if($payment->update(['status'=>'Declined'])):
            if($registration->update(['registered_at'=> NULL, 'registration_expire_at'=>NULL, 'payment_status'=>'Declined', 'declined_msg'=>$request->declined_msg, 'status'=>NULL])):
                return response()->json([ 'status'=>'success']);
            endif;
        endif;
        return response()->json([ 'status'=>'error']);
    }
    // PAYMENT
}
