<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAssessmentRequest;
use App\Http\Requests\StoreAssessmentRequest;
use App\Http\Requests\UpdateAssessmentRequest;
use App\Models\Assessment;
use App\Models\AssessmentList;
use App\Models\ExamType;
use App\Models\Faculty;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AssessmentController extends Controller
{
    public function index(Request $request)
    {
//        explode("_", $cat_id);
        abort_if(Gate::denies('assessment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if (auth()->user()->is_admin) {
            if ($request->ajax()) {
                $query = Assessment::with(['exam_type', 'user'])->select(sprintf('%s.*', (new Assessment())->table));
                $table = Datatables::of($query);

                $table->addColumn('placeholder', '&nbsp;');
                $table->addColumn('actions', '&nbsp;');

                $table->editColumn('actions', function ($row) {
                    $viewGate = 'assessment_show';
                    $editGate = 'assessment_edit';
                    $deleteGate = 'assessment_delete';
                    $crudRoutePart = 'assessments';

                    return view('partials.datatablesActions', compact(
                        'viewGate',
                        'editGate',
                        'deleteGate',
                        'crudRoutePart',
                        'row'
                    ));
                });
                $table->editColumn('teacherid', function ($row) {
                    return $row->teacherid ? $row->teacherid : '';
                });
//                $table->addColumn('faculty_title', function ($row) {
//                    return $row->faculty ? $row->faculty->title : '';
//                });

                $table->addColumn('exam_type_title', function ($row) {
                    return $row->exam_type ? $row->exam_type->title : '';
                });

//                $table->editColumn('department', function ($row) {
//                    return $row->department ? Assessment::DEPARTMENT_SELECT[$row->department] : '';
//                });
//                $table->editColumn('program', function ($row) {
//                    return $row->program ? Assessment::PROGRAM_SELECT[$row->program] : '';
//                });
//                $table->editColumn('semester', function ($row) {
//                    return $row->semester ? Assessment::SEMESTER_SELECT[$row->semester] : '';
//                });
                $table->addColumn('user_name', function ($row) {
                    return $row->user ? $row->user->name : '';
                });

                $table->editColumn('user.email', function ($row) {
                    return $row->user ? (is_string($row->user) ? $row->user : $row->user->email) : '';
                });
                $table->editColumn('course_code', function ($row) {
                    return $row->course_code ? $row->course_code : '';
                });
                $table->editColumn('course_name', function ($row) {
                    return $row->course_name ? $row->course_name : '';
                });
                $table->editColumn('section_and_section_ids', function ($row) {
                    return $row->section_and_section_ids ? $row->section_and_section_ids : '';
                });
                $table->editColumn('blc_course_link', function ($row) {
                    return $row->blc_course_link ? $row->blc_course_link : '';
                });
                $table->editColumn('assessment_question_link', function ($row) {
                    return $row->assessment_question_link ? $row->assessment_question_link : '';
                });
                $table->editColumn('assessment_link', function ($row) {
                    return $row->assessment_link ? $row->assessment_link : '';
                });
//                $table->editColumn('erp_course', function ($row) {
//                    return $row->erp_course ? Assessment::ERP_COURSE_SELECT[$row->erp_course] : '';
//                });

                $table->rawColumns(['actions', 'placeholder', 'exam_type', 'user']);

                return $table->make(true);
            }

            $faculties  = Faculty::get();
            $exam_types = ExamType::get();
            $users      = User::get();

            return view('admin.assessments.index', compact('faculties', 'exam_types', 'users'));

        } else {
            $assessments = Assessment::with(['faculty', 'exam_type', 'user'])->where('user_id',Auth::id())->get();
            $examTypes = ExamType::where('is_active',1)->get();
            $url ='http://apps.diu.edu.bd:8686/externals/rest/smis/semester-list';
            $semesters =$this->getApiData($url);
            $url = "http://apps.diu.edu.bd:8686/externals/rest/smis/v1/department-list";
            $departments =$this->getApiData($url);
//            $url = "http://apps.diu.edu.bd:8686/externals/rest/smis/v1/program-list";
//            $programs =$this->getApiData($url);


            return view('admin.assessments.index-teacher', compact('semesters','departments','assessments','examTypes'));
        }
    }

    public function create()
    {
        abort_if(Gate::denies('assessment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

//        $faculties = Faculty::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $url = "http://apps.diu.edu.bd:8686/externals/rest/smis/faculty-list";
        $faculties = $this->getApiData($url);
        $exam_types = ExamType::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');
        $url ='http://apps.diu.edu.bd:8686/externals/rest/smis/semester-list';
        $semesters =$this->getApiData($url);
        $url = "http://apps.diu.edu.bd:8686/externals/rest/smis/v1/department-list";
        $departments =$this->getApiData($url);
        $url = "http://apps.diu.edu.bd:8686/externals/rest/smis/v1/program-list";
        $programs =$this->getApiData($url);
        return view('admin.assessments.create', compact('programs','faculties', 'exam_types','semesters','departments'));
    }

    public function store(StoreAssessmentRequest $request)
    {
        $data = $request->all();
        $data['user_id']=Auth::id();
        $data['teacherid']=Auth::user()->diu_id;
        $erp_course = $request->input('erp_course');
        $erp_course =  explode("_", $erp_course);
        $data['department'] = $erp_course[4];

        $assessment = Assessment::create($data);
        return redirect()->route('admin.assessments.index');
    }
    public function finalSubmit(StoreAssessmentRequest $request)
    {
        $data = $request->all();
        $data['user_id']=Auth::id();
        $data['teacherid']=Auth::user()->diu_id;
        $assessment = Assessment::create($data);
        return redirect()->route('admin.assessments.index');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('assessment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
$assessment = Assessment::find(decrypt($id));
        if (!auth()->user()->is_admin) {
            $assessment =  Assessment::where('id',$assessment->id)->where('user_id',auth()->id())->first();
            if ($assessment==null){
                return redirect(route('admin.notAllowed'));
            }
        }

        $url = "http://apps.diu.edu.bd:8686/externals/rest/smis/faculty-list";
        $faculties = $this->getApiData($url);

        $exam_types = ExamType::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $url ='http://apps.diu.edu.bd:8686/externals/rest/smis/semester-list';
        $semesters =$this->getApiData($url);
        $url = "http://apps.diu.edu.bd:8686/externals/rest/smis/v1/department-list";
        $departments =$this->getApiData($url);
        $url = "http://apps.diu.edu.bd:8686/externals/rest/smis/v1/program-list";
        $programs =$this->getApiData($url);


        $assessment->load('faculty', 'exam_type', 'user');

        return view('admin.assessments.edit', compact('semesters','departments','programs','faculties', 'exam_types', 'assessment'));
    }

    public function edit2($id)
    {
        $assessment = Assessment::find(decrypt($id));
        abort_if(Gate::denies('assessment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if(!auth()->user()->is_admin) {
            $assessment =  Assessment::where('id',$assessment->id)->where('user_id',auth()->id())->first();
            if ($assessment==null){
                return redirect(route('admin.notAllowed'));
            }
        }
        $url = "http://apps.diu.edu.bd:8686/externals/rest/smis/faculty-list";
        $faculties = $this->getApiData($url);

        $exam_types = ExamType::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');
        $url ='http://apps.diu.edu.bd:8686/externals/rest/smis/semester-list';
        $semesters =$this->getApiData($url);
        $url = "http://apps.diu.edu.bd:8686/externals/rest/smis/v1/department-list";
        $departments =$this->getApiData($url);
        $url = "http://apps.diu.edu.bd:8686/externals/rest/smis/v1/program-list";
        $programs =$this->getApiData($url);
        $assessment->load('faculty', 'exam_type', 'user');
        return view('admin.assessments.create-2nd', compact('semesters','departments','programs','faculties', 'exam_types', 'assessment'));
    }

    public function update(UpdateAssessmentRequest $request, Assessment $assessment)
    {
        $assessment->update($request->all());

        return redirect()->route('admin.assessments.index');
    }

    public function show($id)
    {
        abort_if(Gate::denies('assessment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $assessment = Assessment::find(decrypt($id));
        $assessment->load('exam_type', 'user');
        return view('admin.assessments.show', compact('assessment'));
    }

    public function destroy(Assessment $assessment)
    {
        abort_if(Gate::denies('assessment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assessment->delete();

        return back();
    }

    public function massDestroy(MassDestroyAssessmentRequest $request)
    {
        Assessment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function courseList(Request $request)
    {

        if ($request->ajax()) {
            $semester_id= $request->input('semester_id');
            $employee_id= $request->input('employee_id');
            $url= 'http://apps.diu.edu.bd:8021/rest/v1/teacher/course-list/semester/'.$semester_id.'/teacher/'.$employee_id;
            $courses  = $this->getApiData($url);
            $url ='http://apps.diu.edu.bd:8686/externals/rest/smis/semester-list';
            $semesters =$this->getApiData($url);
            $assessments = Assessment::where('semester',$semester_id)->where('teacherid',$employee_id)->get();
            $examTypes = ExamType::where('is_active',1)->get();
            $data = view('admin.assessments.course',compact('examTypes','semesters','assessments','courses','semester_id'))->render();
            return response()->json(['options'=>$data]);
        }else{
            $url ='http://apps.diu.edu.bd:8686/externals/rest/smis/semester-list';
            $semesters =$this->getApiData($url);
            return view('admin.assessments.course-list', compact('semesters'));
        }
    }

    public function erpCourseList(Request $request)
    {
        if ($request->input('teacherid')){
            $employee_id =$request->input('teacherid');
        }else{
            $employee_id = Auth::user()->diu_id;
        }
        if ($request->ajax()) {
            $semester= $request->input('semester');
            $url= 'http://apps.diu.edu.bd:8021/rest/v1/teacher/course-list/semester/'.$semester.'/teacher/'.$employee_id;
            $courses  = $this->getApiData($url);
            $data = view('admin.assessments.erp_course_list',compact('courses','semester'))->render();
            return response()->json(['options'=>$data]);
        }
    }

    public function erpProgramList(Request $request)
    {
        if ($request->ajax()) {
            $erp_course= $request->input('erp_course');
            $erp_course= explode("_", $erp_course);
            $url= 'http://apps.diu.edu.bd:8686/externals/rest/smis/program-list/department/'.$erp_course[4];
            $programs  = $this->getApiData($url);
            $data = view('admin.assessments.erp_program_list',compact('programs'))->render();
            return response()->json(['options'=>$data]);
        }
    }

    public function departmentList(){
        $url = "http://apps.diu.edu.bd:8686/externals/rest/smis/v1/department-list";
       return $this->getApiData($url);
    }
    public function semesterList(){

        $url ='http://apps.diu.edu.bd:8686/externals/rest/smis/semester-list';
        return $this->getApiData($url);
    }
        public function programList(){
            $url = "http://apps.diu.edu.bd:8686/externals/rest/smis/v1/program-list";
            return $this->getApiData($url);
    }
    public function facultyList(){
        $url = "http://apps.diu.edu.bd:8686/externals/rest/smis/faculty-list";
        return $this->getApiData($url);
    }

    public function getApiData($url){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'clientId: d7aea3a47a474f8f9f53b85ae0adb3d4',
                'clientSecret: 1d9fe966-5f38-44a1-a277-9acb2943901a',
                'Cookie: JSESSIONID=5FCA72D6B7FBAD4EA53200554B71820C'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, true);
    }

    public function assessmentForm($course_code,$department_id,$semester,$section_name,$section_id,$credit,$student){
        abort_if(Gate::denies('assessment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $erpData = [
            "courseSectionId"=> $section_id,

            "departmentId"=> $department_id,
            "courseCode"=> $course_code,
            "sectionName"=> $section_name,
            "numberOfStudent"=> $student,
            "totalCredit"=> $credit
        ];
        $faculties = Faculty::get()->where('is_active','1')->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');
        $depApiURL = 'http://apps.diu.edu.bd:8686/externals/rest/smis/v1/department-list';
        $departments = $this->getApiData($depApiURL);
//    $departments = Department::get()->where('is_active','1')->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $programs = Program::get()->where('is_active','1')->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $semesters = Semester::get()->where('is_active','1')->pluck('title', 'id');

        $exam_types = ExamType::get()->where('is_active','1')->pluck('title', 'id');

        return view('admin.assessments.create2', compact('erpData','faculties', 'departments', 'programs', 'semesters', 'exam_types'));

    }

}
