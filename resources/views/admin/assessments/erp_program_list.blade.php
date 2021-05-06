
@if($programs)
    @foreach($programs as $key => $program)
        <option value="{{ $program['id'] ?? '' }}">
        {{ $program['programName'] ?? '' }}
    </option>
    @endforeach
@else
    <option value="">No Programs for this Course Department</option>
@endif
