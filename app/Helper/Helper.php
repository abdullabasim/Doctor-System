<?php

namespace App\Helper;

use Illuminate\Http\Request;
use App\Http\Requests\Patient\AddPatient as AddPatientRequest;
use App\Http\Requests\Patient\EditPatient as EditPatientRequest;
use App\Models\Patient as patientModel;
use App\Models\Session as sessionModel;
use App\Models\Prescription as prescriptionModel;
use App\Models\JulpharMedical as julpharMedicalModel;
use App\Models\Examination as examinationModel;
use Carbon\Carbon;
use Auth;


Class Helper {


    public static function examinationCheck($id)
    {
        $exam = examinationModel::where('session_id',$id)
                                 ->where('user_id',\Auth::user()->id)
                                 ->first();

        if($exam != null)

            return ("yes");
        else
            return ("no");

    }

}