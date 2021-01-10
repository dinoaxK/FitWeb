<?php

namespace App\Http\Controllers\Portal\Staff;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Exam\Schedule;
use App\Models\Subject;
use App\Models\Exam\Types;
//use Dotenv\Validator;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;

class ExamsController extends Controller
{    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('revalidate');
        $this->middleware('staff.auth');
    }
    
    public function index()
    {
        $exam_schedules=Schedule::orderby('date','desc')->take(6)->get();
        $subjects=Subject::orderby('id')->get();
        $exam_types=Types::orderby('id')->get();
        $exams = Exam::orderby('year')->get();
        return view('portal/staff/exams',compact('exam_schedules','subjects','exam_types', 'exams'));
    }

    public function getExamList(Request $request)
    {
        if ($request->ajax()) {
            $data = Schedule::latest()->get();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> 
                <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                return $actionBtn;
            })
            ->rawColumns(['sction'])
            ->make(true);
        }
    }
    
    // SCHEDULE

    // CREATE
    public function createExamSchedule(Request $request)
    {
        //Validate form data
        $exam_schedule_validator = Validator::make($request->all(), [
            'scheduleExam' => ['required','exists:App\Models\Exam,id'],
            'scheduleSubject' => ['required','exists:App\Models\Subject,id'],
            'scheduleExamType' => ['required','exists:App\Models\Exam\Types,id'],
            'scheduleDate' => ['required', 'date', 'after:today'],
            'scheduleStartTime' => ['required'],
        ]);

        //Check validation errors
        if($exam_schedule_validator->fails()):
            return response()->json(['errors'=>$exam_schedule_validator->errors()]);
        else:
            $exam_schedule = new Schedule();
            $exam_schedule->exam_id = $request->scheduleExam;
            $exam_schedule->subject_id = $request->scheduleSubject;
            $exam_schedule->exam_type_id = $request->scheduleExamType;
            $exam_schedule->date = $request->scheduleDate;
            $exam_schedule->start_time = $request->scheduleStartTime;
            $exam_schedule->end_time = Carbon::parse($request->scheduleStartTime)->addHours('2');
            //Check if data save to db
            if($exam_schedule->save()):
                return response()->json(['status'=>'success', 'exam_schedule'=>$exam_schedule]);
            endif;
        endif;
        return response()->json(['status'=>'error']);
    }
    // CREATE

    // EDIT

    // /EDIT

    // DELETE
    public function deleteExamSchedule(Request $request)
    {
        //Validate schedule id
        $schedule_id_validator = Validator::make($request->all(), [
            'schedule_id' => ['required', 'integer', 'exists:App\Models\Exam\Schedule,id'],
        ]);

        //Check validator fails
        if($schedule_id_validator->fails()):
            return response()->json(['status'=>'error','errors'=>$schedule_id_validator->errors()]);
        else:
            if(Schedule::destroy($request->schedule_id)):
                return response()->json(['status'=>'success']);
            endif;
        endif;
        return response()->json(['status'=>'error', 'data'=>$request->all()]);
            
    }
    // /DELETE

    // /SCHEDULE
}
