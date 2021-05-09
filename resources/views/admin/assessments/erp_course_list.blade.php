
@if($courses)
    @foreach($courses as $key => $course)
        <option value="{{ $course['courseCode'] ?? '' }}_{{ $course['courseTitle'] ?? '' }}_{{ $course['courseSectionId'] ?? '' }}_{{ $course['sectionName'] ?? '' }}_{{ $course['departmentId'] ?? '' }}_{{ $course['departmentName'] ?? '' }}_{{ $course['programId'] ?? '' }}_{{ $course['programName'] ?? '' }}_{{ $course['facultyId'] ?? '' }}_{{ $course['facultyName'] ?? '' }}_{{ $course['courseTypeId'] ?? '' }}_{{ $course['numberOfStudent'] ?? '' }}_{{ $course['totalCredit'] ?? '' }}">
        {{ $course['courseTitle'] ?? '' }}
        ({{ $course['courseCode'] ?? '' }})_Section-{{ $course['sectionName'] ?? '' }}_Dept-{{ $course['departmentName'] ?? '' }}
    </option>
    @endforeach
@else
    <option value="">No Courses for this semester</option>
@endif

{{--                <table class=" table table-bordered table-striped table-hover datatable datatable-Semester">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th width="10">--}}

{{--                        </th>--}}
{{--                        <th>--}}
{{--                            Course Title (Course Code)--}}
{{--                        </th>--}}
{{--<th>Department Name</th>--}}
{{--<th>Section and ID</th>--}}
{{--<th>Credit</th>--}}
{{--<th>Number of Student</th>--}}
{{--                        <th>Action</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--@if($courses)--}}
{{--                    @foreach($courses as $key => $course)--}}
{{--                        <tr data-entry-id="{{ $course['courseSectionId'] }}">--}}
{{--                            <td>--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                {{ $course['courseTitle'] ?? '' }}--}}
{{--                                ({{ $course['courseCode'] ?? '' }})--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                {{ $course['departmentName'] ?? '' }}--}}
{{--                            </td>   <td>--}}
{{--                                {{ $course['sectionName'] ?? '' }}-{{ $course['courseSectionId'] ?? '' }}--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                {{ $course['totalCredit'] ?? '' }}--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                {{ $course['numberOfStudent'] ?? '' }}--}}
{{--                            </td>--}}
{{--                            <td><a href="{{route('admin.assessments.assessment_form',[$course['courseCode'],encrypt($course['courseTitle']),$course['departmentId'],encrypt($course['departmentName']),$semester_id,$course['sectionName'],$course['courseSectionId'],$course['totalCredit'],$course['numberOfStudent'],$course['courseTypeId']])}}">Assessment</a> </td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
{{--@else--}}
{{--                    <tr>--}}
{{--                        <td colspan="6">No Courses for this semester</td>--}}
{{--                    </tr>--}}
{{--@endif--}}
{{--                    </tbody>--}}
{{--                </table>--}}
