@extends('layouts.admin')
@section('content')
    @can('assessment_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.assessments.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.assessment.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.assessment.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Assessment">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.assessment.fields.exam_type') }}
                        </th>

                        <th>
                            {{ trans('cruds.assessment.fields.course_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.assessment.fields.department') }}
                        </th>
                        <th>
                            {{ trans('cruds.assessment.fields.semester') }}
                        </th>
                        <th>
                            {{ trans('cruds.assessment.fields.course_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.assessment.fields.blc_course_link') }}
                        </th>
                        <th>
                            {{ trans('cruds.assessment.fields.assessment_question_link') }}
                        </th>
                        <th>
                            {{ trans('cruds.assessment.fields.assessment_link') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($assessments as $key => $assessment)
                        <tr data-entry-id="{{ $assessment->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $assessment->exam_type->title ?? '' }}
                            </td>
                            <td>
                                {{ $assessment->course_name ?? '' }}
                            </td>
                            <td>
                                @foreach($departments  as $department)
                                    @if($department['id']==$assessment->department)
                                        {{$department['departmentName']}}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach($semesters  as $semester)
                                    @if($semester['id']==$assessment->semester)
                                        {{$semester['semesterName']}}-{{$semester['semesterYear']}}
                                    @endif
                                @endforeach

                            </td>
                            <td>
                                {{ $assessment->course_name ?? '' }}
                            </td>
                            <td>
                                {{ $assessment->blc_course_link ?? '' }}
                            </td>
                            <td>
                                {{ $assessment->assessment_question_link ?? '' }}
                            </td>
                            <td>
                                {{ $assessment->assessment_link ?? '' }}
                            </td>
                            <td>

@if(\App\Models\Assessment::checkExamType($assessment->course_code,$assessment->user_id,$assessment->semester)<2)
                                @foreach($examTypes as $exam)
                                    @if($assessment->exam_type->id!=$exam->id)
                                    <a href="{{route('admin.assessments.editFinal',[encrypt($assessment->id)])}}" class="btn btn-xs btn-info">
                                        {{$exam->title}} Assessment
                                    </a>
                                        @endif
                                @endforeach
                                @else
   <span class="btn btn-xs btn-info" disabled="disabled"> {{"Done"}}</span>
                                @endif

                                @can('assessment_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.assessments.show', encrypt($assessment->id)) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('assessment_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.assessments.edit', $assessment->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('assessment_delete')
                                    <form action="{{ route('admin.assessments.destroy', $assessment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('assessment_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.assessments.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: { ids: ids, _method: 'DELETE' }})
                            .done(function () { location.reload() })
                    }
                }
            }
            dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [[ 1, 'desc' ]],
                pageLength: 100,
            });
            let table = $('.datatable-Assessment:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })

    </script>
@endsection
