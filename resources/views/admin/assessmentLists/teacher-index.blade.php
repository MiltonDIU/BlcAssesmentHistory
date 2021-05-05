@extends('layouts.admin')
@section('content')
    @can('assessment_list_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.assessment-lists.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.assessmentList.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.assessmentList.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                    <thead>
                    <tr>
                        <th></th>
                        <th>
                            Department Name
                        </th>
                        <th>
                            BLC Course Title
                        </th>
                        <th>
                            Assessment Type
                        </th>
                        <th>
                            BLC Course Section
                        </th>
                        <th>
                            Course Link
                        </th>
                        <th>
                            BLC Assessment Question Link
                        </th>
                        <th>
                           BLC Assessment Link
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($assessmentLists as $key => $assessment)
                        <tr data-entry-id="{{ $assessment->id }}">
                            <td>
                                {{ $key+=1 }}
                            </td>
                            <td>
                                {{ $assessment->department ?? '' }}
                            </td>
                            <td>
                                {{ $assessment->blc_course_title ?? '' }}
                                ({{ $assessment->blc_course_code ?? '' }})
                            </td>
                            <td>
                                {{ $assessment->blc_course_section ?? '' }}
                            </td>
                            <td>
                                {{ $assessment->exam_type->title ?? '' }}
                            </td>
                            <td>
                                {{ $assessment->blc_course_link ?? '' }}
                            </td>
                            <td>
                                {{ $assessment->blc_assessment_question_link ?? '' }}
                            </td>
                            <td>
                                {{ $assessment->blc_assessment_link ?? '' }}
                            </td>
                            <td>
@foreach($examTypes as $exam)
    <a href="" class="dt-buttons {{($assessment->exam_type->id==$exam->id)?"disabled":""}}">
        {{$exam->title}}
    </a>
@endforeach
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
            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [[ 1, 'desc' ]],
                pageLength: 100,
            });
            let table = $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })

    </script>
@endsection
