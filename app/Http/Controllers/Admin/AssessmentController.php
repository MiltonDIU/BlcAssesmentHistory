<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAssessmentRequest;
use App\Http\Requests\StoreAssessmentRequest;
use App\Http\Requests\UpdateAssessmentRequest;
use App\Models\Assessment;
use App\Models\Department;
use App\Models\ExamType;
use App\Models\Faculty;
use App\Models\Program;
use App\Models\Semester;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AssessmentController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('assessment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Assessment::with(['faculty', 'department', 'program', 'semester', 'exam_type', 'user'])->select(sprintf('%s.*', (new Assessment())->table));
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

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('faculty_title', function ($row) {
                return $row->faculty ? $row->faculty->title : '';
            });

            $table->addColumn('department_title', function ($row) {
                return $row->department ? $row->department->title : '';
            });

            $table->addColumn('program_title', function ($row) {
                return $row->program ? $row->program->title : '';
            });

            $table->addColumn('semester_title', function ($row) {
                return $row->semester ? $row->semester->title : '';
            });

            $table->addColumn('exam_type_title', function ($row) {
                return $row->exam_type ? $row->exam_type->title : '';
            });

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

            $table->rawColumns(['actions', 'placeholder', 'faculty', 'department', 'program', 'semester', 'exam_type', 'user']);

            return $table->make(true);
        }

        $faculties   = Faculty::get();
        $departments = Department::get();
        $programs    = Program::get();
        $semesters   = Semester::get();
        $exam_types  = ExamType::get();
        $users       = User::get();

        return view('admin.assessments.index', compact('faculties', 'departments', 'programs', 'semesters', 'exam_types', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('assessment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $faculties = Faculty::get()->where('is_active','1')->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $departments = Department::get()->where('is_active','1')->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $programs = Program::get()->where('is_active','1')->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $semesters = Semester::get()->where('is_active','1')->pluck('title', 'id');

        $exam_types = ExamType::get()->where('is_active','1')->pluck('title', 'id');

        return view('admin.assessments.create', compact('faculties', 'departments', 'programs', 'semesters', 'exam_types'));
    }

    public function store(StoreAssessmentRequest $request)
    {
        $data = $request->all();
        $data['user_id']=auth()->id();
        $assessment = Assessment::create($data);

        return redirect()->route('admin.assessments.index');
    }

    public function edit(Assessment $assessment)
    {
        abort_if(Gate::denies('assessment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $faculties = Faculty::get()->where('is_active','1')->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $departments = Department::get()->where('is_active','1')->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $programs = Program::get()->where('is_active','1')->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $semesters = Semester::get()->where('is_active','1')->pluck('title', 'id');

        $exam_types = ExamType::get()->where('is_active','1')->pluck('title', 'id');

        $assessment->load('faculty', 'department', 'program', 'semester', 'exam_type', 'user');

        return view('admin.assessments.edit', compact('faculties', 'departments', 'programs', 'semesters', 'exam_types', 'assessment'));
    }

    public function update(UpdateAssessmentRequest $request, Assessment $assessment)
    {
        $assessment->update($request->all());

        return redirect()->route('admin.assessments.index');
    }

    public function show(Assessment $assessment)
    {
        abort_if(Gate::denies('assessment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assessment->load('faculty', 'department', 'program', 'semester', 'exam_type', 'user');

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
}
