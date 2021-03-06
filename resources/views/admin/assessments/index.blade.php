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
    @php
        $as = new \App\Http\Controllers\Admin\AssessmentController();
    @endphp
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.assessment.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Assessment">
                <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        Teacher ID
                    </th>
                    <th>
                        {{ trans('cruds.assessment.fields.semester') }}
                    </th>
                    <th>
                        {{ trans('cruds.assessment.fields.faculty') }}
                    </th>
                    <th>
                        {{ trans('cruds.assessment.fields.exam_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.assessment.fields.department') }}
                    </th>
                    <th>
                        {{ trans('cruds.assessment.fields.program') }}
                    </th>

{{--                    <th>--}}
{{--                        {{ trans('cruds.assessment.fields.user') }}--}}
{{--                    </th>--}}
{{--                    <th>--}}
{{--                        {{ trans('cruds.user.fields.email') }}--}}
{{--                    </th>--}}



                    <th>BLC Course Info</th>
{{--                    --}}
{{--                    <th>--}}
{{--                        {{ trans('cruds.assessment.fields.course_code') }}--}}
{{--                    </th>--}}
{{--                    <th>--}}
{{--                        {{ trans('cruds.assessment.fields.course_name') }}--}}
{{--                    </th>--}}
{{--                    <th>--}}
{{--                        {{ trans('cruds.assessment.fields.section_and_section_ids') }}--}}
{{--                    </th>--}}
{{--                    --}}



{{--                    <th>--}}
{{--                        {{ trans('cruds.assessment.fields.blc_course_link') }}--}}
{{--                    </th>--}}
{{--                    <th>--}}
{{--                        {{ trans('cruds.assessment.fields.assessment_question_link') }}--}}
{{--                    </th>--}}
{{--                    <th>--}}
{{--                        {{ trans('cruds.assessment.fields.assessment_link') }}--}}
{{--                    </th>--}}

                    <th>BLC Link</th>
                    <th>
                        {{ trans('cruds.assessment.fields.erp_course') }}
                    </th>

                    <th>
                        &nbsp;
                    </th>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($as->semesterList() as $key => $item)
                                <option value="{{ $item['id'] }}">{{ $item['semesterName'].'-'.$item['semesterYear'] }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($as->facultyList() as $key => $item)
                                <option value="{{ $item['id'] }}">{{ $item['facultyShortName'] }}</option>
                            @endforeach
                        </select>



                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($exam_types as $key => $item)
                                <option value="{{ $item->title }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($as->departmentList() as $key => $item)
                                <option value="{{ $item['id'] }}">{{ $item['departmentShortName'] }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($as->programList() as $key => $item)
                                <option value="{{ $item['id'] }}">{{ $item['programShortName'] }}</option>
                            @endforeach
                        </select>
                    </td>

{{--                    <td>--}}
{{--                        <select class="search">--}}
{{--                            <option value>{{ trans('global.all') }}</option>--}}
{{--                            @foreach($users as $key => $item)--}}
{{--                                <option value="{{ $item->name }}">{{ $item->name }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                    </td>--}}
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
{{--                    <td>--}}
{{--                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">--}}
{{--                    </td>--}}
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
{{--                    <td>--}}
{{--                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">--}}
{{--                    </td>--}}
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                </tr>
                </thead>
            </table>
        </div>
    </div>



@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('assessment_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.assessments.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
                        return entry.id
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

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('admin.assessments.index') }}",
                columns: [
                    { data: 'placeholder', name: 'placeholder' },
                    { data: 'teacherid', name: 'teacherid' },
                    { data: 'semester_name', name: 'semester' },
                    { data: 'faculty_name', name: 'faculty_id' },
                    { data: 'exam_type_title', name: 'exam_type.title'},
                    { data: 'department_name', name: 'department'},
                    { data: 'program_name', name: 'program'},

                    // { data: 'user_name', name: 'user.name' },
                    // { data: 'user.email', name: 'user.email' },






                    //
                    // { data: 'course_code', name: 'course_code' },
                    // { data: 'course_name', name: 'course_name' },
                    // { data: 'section_and_section_ids', name: 'section_and_section_ids' },
                    //


                    { "data": "course_name",
                        "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {

                           // $(nTd).html("<a target='_blank' href='"+oData.blc_course_link+"'>"+"Course Link"+"</a>");
                            $(nTd).html("<span>"+oData.course_code+": "+oData.course_name+"<br> Section:"+oData.section_and_section_ids+"</span>");
                        }
                    },




                    // { data: 'blc_course_link', name: 'blc_course_link' },
                    { "data": "blc_course_link",
                        "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                            $(nTd).html("<a target='_blank' href='"+oData.blc_course_link+"'>"+"Course"+"</a><br>"+"<a target='_blank' href='"+oData.assessment_question_link+"'>"+"Assessment Question"+"</a><br>"+"<a target='_blank' href='"+oData.assessment_link+"'>"+"Assessment"+"</a>");
                            // $(nTd).html("<a target='_blank' href='"+oData.blc_course_link+"'>"+"Course Link"+"</a>");
                            // $(nTd).html("<a target='_blank' href='"+oData.blc_course_link+"'>"+"Course Link"+"</a>");
                        }
                    },
                    // { data: 'assessment_question_link', name: 'assessment_question_link' },
                    // { "data": "assessment_question_link",
                    //     "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                    //         $(nTd).html("<a target='_blank' href='"+oData.assessment_question_link+"'>"+"Assessment Question Link"+"</a>");
                    //     }
                    // },
                    // { data: 'assessment_link', name: 'assessment_link' },
                    // { "data": "assessment_link",
                    //     "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                    //         $(nTd).html("<a target='_blank' href='"+oData.assessment_link+"'>"+"Assessment Link"+"</a>");
                    //     }
                    // },

                    // { data: 'erp_course', name: 'erp_course' },
                    { "data": "erp_course",
                        "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                            $(nTd).html("<span>"+oData.erp_course.split("_"-2)+"</span>");
                        }
                    },
                    { data: 'actions', name: '{{ trans('global.actions') }}' }
                ],
                orderCellsTop: true,
                order: [[ 1, 'desc' ]],
                pageLength: 10,
            };
            let table = $('.datatable-Assessment').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

            let visibleColumnsIndexes = null;
            $('.datatable thead').on('input', '.search', function () {

                let strict = $(this).attr('strict') || false
                let value = strict && this.value ? "^" + this.value + "$" : this.value

                let index = $(this).parent().index()
                if (visibleColumnsIndexes !== null) {
                    index = visibleColumnsIndexes[index]
                }

                table
                    .column(index)
                    .search(value, strict)
                    .draw()
            });
            table.on('column-visibility.dt', function(e, settings, column, state) {
                visibleColumnsIndexes = []
                table.columns(":visible").every(function(colIdx) {
                    visibleColumnsIndexes.push(colIdx);
                });
            })
        });


    </script>


@endsection
