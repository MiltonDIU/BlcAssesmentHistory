
@if($courses)
    @foreach($courses as $key => $course)
        <option value="{{ $course['courseCode'] ?? '' }}__mr9__{{ $course['courseTitle'] ?? '' }}__mr9__{{ $course['courseSectionId'] ?? '' }}__mr9__{{ $course['sectionName'] ?? '' }}__mr9__{{ $course['departmentId'] ?? '' }}__mr9__{{ $course['departmentName'] ?? '' }}__mr9__{{ $course['programId'] ?? '' }}__mr9__{{ $course['programName'] ?? '' }}__mr9__{{ $course['facultyId'] ?? '' }}__mr9__{{ $course['facultyName'] ?? '' }}__mr9__{{ $course['courseTypeId'] ?? '' }}__mr9__{{ $course['numberOfStudent'] ?? '' }}__mr9__{{ $course['totalCredit'] ?? '' }}">
        ({{ $course['courseSectionId'] ?? '' }})
        {{ $course['courseCode'] ?? '' }}: {{ $course['courseTitle'] ?? '' }}, Section: {{ $course['sectionName'] ?? '' }}, Department of {{ $course['departmentName'] ?? '' }}
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
