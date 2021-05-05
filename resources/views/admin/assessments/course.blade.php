
        <div class="col-md-6 table-responsive">
            <h3>ERP Data</h3>
            <table class=" table table-bordered table-striped table-hover datatable datatable-Semester">
                <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        Course Title (Course Code)
                    </th>
                    <th>Department Name</th>
                    <th>Section and ID</th>
                    <th>Credit</th>
                    <th>Number of Student</th>
                </tr>
                </thead>
                <tbody>
                @if($courses)
                    @foreach($courses as $key => $course)
                        <tr data-entry-id="{{ $course['courseSectionId'] }}">
                            <td>
                            </td>
                            <td>
                                {{ $course['courseTitle'] ?? '' }}
                                ({{ $course['courseCode'] ?? '' }})
                            </td>
                            <td>
                                {{ $course['departmentName'] ?? '' }}
                            </td>   <td>
                                {{ $course['sectionName'] ?? '' }}-{{ $course['courseSectionId'] ?? '' }}
                            </td>
                            <td>
                                {{ $course['totalCredit'] ?? '' }}
                            </td>
                            <td>
                                {{ $course['numberOfStudent'] ?? '' }}
                            </td>
                             </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">No Courses for this semester</td>
                    </tr>
                @endif
                </tbody>
            </table>

        </div>
        <div class="col-md-6 table-responsive">
            <h3>Internal Data</h3>
            <table class=" table table-bordered table-striped table-hover datatable datatable-Semester">
                <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        Course Title (Course Code)
                    </th>
                    <th>Exam Type</th>

                    <th>Semester</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @if($assessments)
                    @foreach($assessments as $key => $assessment)
                        <tr>
                            <td>
                            </td>
                            <td>
                               {{$assessment->course_name}}
                               ({{$assessment->course_code}})
                            </td>
                            <td>
                                {{ $assessment->exam_type->title ?? '' }}
                            </td>
                            <td>
                                @foreach($semesters  as $semester)
                                    @if($semester['id']==$assessment->semester)
                                        {{$semester['semesterName']}}-{{$semester['semesterYear']}}
                                    @endif
                                @endforeach

                            </td>
                            <td>
                                @if(\App\Models\Assessment::checkExamType($assessment->course_code,$assessment->user_id,$assessment->semester)<2)
                                    @foreach($examTypes as $exam)
                                        @if($assessment->exam_type->id!=$exam->id)
                                            <a href="{{route('admin.assessments.editFinal',[$assessment->id])}}" class="btn btn-xs btn-info">
                                                {{$exam->title}} Assessment
                                            </a>
                                        @endif
                                    @endforeach
                                @else
                                    <span class="btn btn-xs btn-info" disabled="disabled"> {{"Done"}}</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">No Courses for this semester</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
