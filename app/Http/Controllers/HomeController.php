<?php

namespace App\Http\Controllers;


use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Http\Requests\Patient\AddPatient as AddPatientRequest;
use App\Http\Requests\Patient\EditPatient as EditPatientRequest;
use App\Http\Requests\Session\addSession as addSessionRequest;
use App\Http\Requests\Medical\GetMedicals as getMedicalsRequest;
use App\Http\Requests\Medical\EditMedicals as editMedicalsRequest;
use App\Http\Requests\Examination\AddExamination as addExaminationRequest;
use App\Http\Requests\Examination\EditExamination as editExaminationRequest;


use App\Models\Patient as patientModel;
use App\Models\Session as sessionModel;
use App\Models\Prescription as prescriptionModel;
use App\Models\Examination as examinationModel;
use App\Models\JulpharMedical as julpharMedicalModel;
use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       return view('add_patient');
    }

    public function addPatientPage()
    {
        return view('add_patient');
    }

    public function addPatient(AddPatientRequest $request)
    {

        try{

            $patient=patientModel::where('name',$request->name)
                                  ->where('age',$request->age)
                                  ->first();
          // dd($patient);
            if($patient == null)

            {


            patientModel::create([
                'name'=>$request->name,
                'age'=>$request->age,
                'mobile'=>$request->mobile,
                'user_id'=> \Auth::user()->id,
            ]);

            return redirect('/addPatient')
                ->with('success', 'Patient Add successfully.');
            }
            else
            {
                return back()
                    ->with('error', 'The Patient is already exist!!');
            }
        }
        catch (\Exception $e)
        {

            return back()
                ->with('error', 'Patient not Add Please Try Again!!');
        }
    }

    public function managePatient()
    {

        $patients = patientModel::where('user_id',Auth::user()->id)
                                 ->get();
       // $patient = patientModel::findOrFail($id);
        $julphar=julpharMedicalModel::orderBy('id', 'DESC')->
                                      get();

        return view('manage_patient',[
            'patients'=>$patients,
            'julphar'=>$julphar
        ]);
    }

    public function patientDelete($id)
    {

        try {
            $patient = patientModel::findOrFail($id);

            patientModel::destroy(($patient->id));

            return back()
                ->with('success', 'Patient Delete successfully.');
        } catch (\Exception $e) {


            return back()
                ->with('error', 'Patient not Deleted Please Try Again!!');
        }
    }

    public function editPatient(EditPatientRequest $request)
    {


        try{

            $patient =patientModel::findOrFail($request->patientId);

            patientModel::where('id',$patient->id)->update([
                'name'=>$request->name,
                'age'=>$request->age,
                'mobile'=>$request->mobile,
            ]);

            return redirect('/managePatient')
                ->with('success', 'Patient Edit successfully.');
        }
        catch (\Exception $e)
        {

            return back()
                ->with('error', 'Patient not Edit Please Try Again!!');
        }
    }

    public function addSessionPage($id)
    {
        $patient = patientModel::findOrFail($id);
        $julphar=julpharMedicalModel::orderBy('id', 'DESC')->
                             get();


        return view('add_session',[
            'patient'=>$patient,
            'julphar'=>$julphar
        ]);
    }

    public function addSession(addSessionRequest $request)
    {

        \DB::beginTransaction();

        try{

           $session= sessionModel::create([
                'patient_id'=>$request->patientId,
                'diagnosis'=>$request->diagnosis,
                'user_id'=> \Auth::user()->id,
            ]);

            if($request->medicalsPatient != null)
            {
                $medicals= explode(',', $request->medicalsPatient);

                foreach ($medicals as $medical)
                {
                    prescriptionModel::create([
                       'session_id'=> $session->id,
                        'desc'=>$medical

                    ]);
                }
            }

            \DB::commit();

            return redirect('/manageSession/'.$request->patientId)
                ->with('success', 'Session Add successfully.');
        }
        catch (\Exception $e)
        {
            \DB::rollBack();

            return  redirect('/manageSession/'.$request->patientId)
                ->with('error', 'Session not Add Please Try Again!!');
        }
    }

    public function manageSession($id)
    {

        try {
            $patient = patientModel::findOrFail($id);

            $sessions = sessionModel::where('patient_id',$patient->id)
                                    ->where('user_id',\Auth::user()->id)
                                    ->get();


            return view('manage_session',[
                'patient'=>$patient,
                'sessions'=>$sessions
            ]);

          }
        catch (\Exception $e) {


            return back()
                ->with('error', 'There is no session ,please try Again!!');
        }
    }

    public function getMedicals(getMedicalsRequest $request)
    {

       $medicals= prescriptionModel::where('session_id',$request->sessionId)
            ->pluck('desc')
            ->toArray();

        return response()->json($medicals);
    }

    public function editMedical(editMedicalsRequest $request)
    {


        \DB::beginTransaction();

        try{

            $session= sessionModel::where('id',$request->sessionId)
                                    ->where('patient_id',$request->patientId)
                                    ->where('user_id',Auth::user()->id)
                                    ->update([
                                        'diagnosis'=>$request->diagnosis,
                                           ]);

            prescriptionModel::where('session_id',$request->sessionId)
                ->delete();

            if($request->medicals != null)
            {

                foreach ($request->medicals as $medical)
                {
                    if($medical != "")
                    prescriptionModel::create([
                        'session_id'=> $request->sessionId,
                        'desc'=>$medical

                    ]);
                }
            }


            \DB::commit();

            return redirect('/manageSession/'.$request->patientId)
                ->with('success', 'Session Edit successfully.');
        }
        catch (\Exception $e)
        {
            \DB::rollBack();


            return  redirect('/manageSession/'.$request->patientId)
                ->with('error', 'Session not Edit Please Try Again!!');
        }
    }

    public function addExamination(addExaminationRequest $request)
    {

        try{

            examinationModel::create([
                'title'=>$request->title,
                'desc'=>$request->desc,
                'session_id'=>$request->sessionId,
                'user_id'=>Auth::user()->id

            ]);

            return redirect('/manageSession/'.$request->patientId)
                ->with('success', 'Examination Add successfully.');
        }
        catch (\Exception $e)
        {

            return redirect('/manageSession/'.$request->patientId)
                ->with('error', 'Examination not Add Please Try Again!!');
        }
    }

    public function getExamination(getMedicalsRequest $request)
    {
        $exam= examinationModel::where('session_id',$request->sessionId)
            ->get();


        return response()->json($exam);
    }

    public function editExamination(editExaminationRequest $request)
    {


        try{

            examinationModel::where('id',$request->examId)
                             ->where('user_id',Auth::user()->id)
                             ->where('session_id',$request->sessionId)
                             -> update([
                                'title'=>$request->title,
                                'desc'=>$request->desc,
                            ]);

            return redirect('/manageSession/'.$request->patientId)
                ->with('success', 'Examination Edit successfully.');
        }
        catch (\Exception $e)
        {



            return  redirect('/manageSession/'.$request->patientId)
                ->with('error', 'Examination not Edit Please Try Again!!');
        }
    }

    public function sessionDelete($id,$patientId)
    {
        \DB::beginTransaction();
        try {
            $session = sessionModel::where('id',$id)
                                     ->where('user_id',Auth::user()->id)
                                     ->first();
            //  dd($session);
            if($session != null)
            {
                prescriptionModel::where('session_id',$session->id)
                    ->delete();

                examinationModel::where('session_id',$session->id)
                    ->where('user_id',Auth::user()->id)
                    ->delete();

                sessionModel::where('id',$session->id)
                    ->where('user_id',Auth::user()->id)
                    ->delete();
            }

            \DB::commit();
            return redirect('/manageSession/'. $patientId)
                ->with('success', 'Session Delete successfully.');
        } catch (\Exception $e) {

            \DB::rollBack();

            return redirect('/manageSession/'. $patientId)
                ->with('error', 'Session not Deleted Please Try Again!!');
        }
    }

    public function examinationDelete($id)
    {
        $examination = examinationModel::findOrFail($id);

        $session=sessionModel::findOrFail($examination->session_id);
        try {

            examinationModel::destroy(($examination->id));

            return redirect('/manageSession/'. $session->patient_id)
                ->with('success', 'Examination Delete successfully.');
        } catch (\Exception $e) {


            return redirect('/manageSession/'. $session->patient_id)
                ->with('error', 'Examination not Deleted Please Try Again!!');
        }
    }

    public function prescriptionPrint($id)
    {
        $session = sessionModel::where('id',$id)
                                 ->where('user_id',Auth::user()->id)
                                 ->first();

        try {



           return view('prescription_print',[
               'session'=>$session
           ]);
        } catch (\Exception $e) {


            return redirect('/manageSession/'. $session->patient_id)
                ->with('error', 'Examination not Deleted Please Try Again!!');
        }
    }

    public function examinationPrint($id)
    {
       // dd($id);
        $examination = examinationModel::where('id',$id)
            ->where('user_id',Auth::user()->id)
            ->first();
//dd($examination->session->patient->name);

        try {



            return view('examination_print',[
                'examination'=>$examination
            ]);
        } catch (\Exception $e) {


            return redirect('/manageSession/'. $examination->session->patient_id)
                ->with('error', 'Examination not Deleted Please Try Again!!');
        }
    }

}
