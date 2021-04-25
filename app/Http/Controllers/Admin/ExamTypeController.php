<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyExamTypeRequest;
use App\Http\Requests\StoreExamTypeRequest;
use App\Http\Requests\UpdateExamTypeRequest;
use App\Models\ExamType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExamTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('exam_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $examTypes = ExamType::all();

        return view('admin.examTypes.index', compact('examTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('exam_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.examTypes.create');
    }

    public function store(StoreExamTypeRequest $request)
    {
        $examType = ExamType::create($request->all());

        return redirect()->route('admin.exam-types.index');
    }

    public function edit(ExamType $examType)
    {
        abort_if(Gate::denies('exam_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.examTypes.edit', compact('examType'));
    }

    public function update(UpdateExamTypeRequest $request, ExamType $examType)
    {
        $examType->update($request->all());

        return redirect()->route('admin.exam-types.index');
    }

    public function show(ExamType $examType)
    {
        abort_if(Gate::denies('exam_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.examTypes.show', compact('examType'));
    }

    public function destroy(ExamType $examType)
    {
        abort_if(Gate::denies('exam_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $examType->delete();

        return back();
    }

    public function massDestroy(MassDestroyExamTypeRequest $request)
    {
        ExamType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
