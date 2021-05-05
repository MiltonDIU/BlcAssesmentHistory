@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
           My Course List
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="card-body">
                    <form method="POST" action="{{ route("admin.departments.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="required" for="employee_id">Employee ID</label>
                            <input class="form-control {{ $errors->has('employee_id') ? 'is-invalid' : '' }}" type="text" name="employee_id" id="employee_id" value="{{ old('employee_id', '') }}" required>
                            @if($errors->has('employee_id'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('employee_id') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="required" for="faculty_id">{{ "Select Semester" }}</label>
                            <select class="form-control select2 {{ $errors->has('semester_id') ? 'is-invalid' : '' }}" name="semester_id" id="semester_id" required>
                                @foreach($semesters as $key => $value)
                                    <option value="{{ $value['id'] }}">{{ $value['semesterName'].'-'.$value['semesterYear'] }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('semester_id'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('semester_id') }}
                                </div>
                            @endif

                        </div>
                    </form>
                </div>

                <div class="row" id="course_list">
                </div>

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
                pageLength: 2,
            });

        })
    </script>
    <script type="text/javascript">

        $("select[name='semester_id']").change(function(){
            var semester_id = $(this).val();
            var token = $("input[name='_token']").val();
            var employee_id = $("input[name='employee_id']").val();
            $.ajax({
                url: "<?php echo route('admin.assessments.course-list') ?>",
                method: 'POST',
                data: {semester_id:semester_id,employee_id:employee_id, _token:token},
                success: function(data) {
                    console.log(data);
                    $("div[id='course_list']").html('');
                    $("div[id='course_list']").html(data.options);
                }
            });
        });

        $(document).ready(function(){
            $("#employee_id").change(function(){
                var semester_id = $("#semester_id").val();
                var token = $("input[name='_token']").val();
                var employee_id = $("input[name='employee_id']").val();
                if (semester_id!=null){
                    $.ajax({
                        url: "<?php echo route('admin.assessments.course-list') ?>",
                        method: 'POST',
                        data: {semester_id:semester_id,employee_id:employee_id, _token:token},
                        success: function(data) {
                            console.log(data);
                            $("div[id='course_list']").html('');
                            $("div[id='course_list']").html(data.options);
                        }
                    });
                }
            });
        });


    </script>
@endsection
