@php
    $selectedCountries = $student->destinationStudies->pluck('country')->toArray();
@endphp

<div class="card mt-5">
    <div class="card-header bg-primary text-white">
        <strong>Academic History</strong>
    </div>
    <div class="card-body" id="academicHistorySection">
        <form action="{{ route('student.academic-history.store') }}" method="POST" class="mt-3">
            @csrf
            <input type="hidden" name="student_id" value="{{ $student->id }}">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <strong>Education</strong>
                </div>
                <div class="card-body row">
                    <input type="hidden" name="student_id" value="{{ $student->id }}">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Country</label>
                            <input type="text" name="country" class="form-control" placeholder="Country">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Institution Name</label>
                            <input type="text" name="institution_name" class="form-control" placeholder="Institution Name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Course of Study</label>
                            <input type="text" name="course_of_study" class="form-control" placeholder="Course of Study">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Level of study</label>
                            <select class="form-control" name="level_of_study">
                                <option value="">Choose one</option>
                                @foreach($listLevelOfStudy as $level)
                                    <option value="{{ $level }}">{{ $level }}</option>
                                @endforeach
                            </select>
                        </div>
                       
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Start Date</label>
                            <input type="text" name="start_date" class="form-control form-month">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">End Date</label>
                            <input type="text" name="end_date" class="form-control form-month">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Time</label>
                            <select name="shift" class="form-control">
                                <option value="Full-time">Full-time</option>
                                <option value="Part-time">Part-time</option>
                            </select>                
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Grading Score</label>
                            <input type="text" name="grading_score" class="form-control" placeholder="Grading Score">
                        </div>
                        <div class="mb-3 text-end">
                            <button type="submit" class="btn btn-primary btn-sm">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @foreach($student->academicHistories as $edu)
        <div class="card mb-4 position-relative">
            <div class="card-header bg-success text-white d-flex">
                <strong>Education</strong>
                <form action="{{ route('student.academic-history.destroy', $edu->id) }}" method="POST" onsubmit="return confirm('Delete this record?')" class="m-0 p-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-light text-danger border-0" title="Delete">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </div>
            <div class="card-body">
                <form action="{{ route('student.academic-history.update', $edu->id) }}" method="POST" class="mt-3 row">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="student_id" value="{{ $student->id }}">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Country</label>
                            <input type="text" name="country" value="{{ $edu->country }}" class="form-control" placeholder="Country">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Institution Name</label>
                            <input type="text" name="institution_name" value="{{ $edu->institution_name }}" class="form-control" placeholder="Institution Name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Course of Study</label>
                            <input type="text" name="course_of_study" value="{{ $edu->course_of_study }}" class="form-control" placeholder="Course of Study">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Level of study</label>
                            <select class="form-control" name="level_of_study">
                                <option value="">Choose one</option>
                                @foreach($listLevelOfStudy as $level)
                                    <option value="{{ $level }}" {{$edu->level_of_study == $level ? 'selected' : ''}}>{{ $level }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Start Date</label>
                            <input type="text" name="start_date" class="form-control form-month" value="{{ $edu->start_date ? \Carbon\Carbon::parse($edu->start_date)->format('Y-m') : '' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">End Date</label>
                            <input type="text" name="end_date" class="form-control form-month" value="{{ $edu->end_date ? \Carbon\Carbon::parse($edu->end_date)->format('Y-m') : '' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Time</label>
                            <select name="shift" class="form-control">
                                <option value="Full-time" {{ $edu->shift == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                                <option value="Part-time" {{ $edu->shift == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                            </select>                
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Grading Score</label>
                            <input type="text" name="grading_score" class="form-control" placeholder="Grading Score" value="{{ $edu->grading_score }}">
                        </div>
                        <div class="mb-3 text-end">
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>

<form action="{{ route('student.destination-country.store') }}" method="POST" class="mt-3">
    @csrf
    <input type="hidden" name="student_id" value="{{ $student->id }}">
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <strong>Destination Countries</strong>
        </div>
        <div class="card-body row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="form-label">Country</label>
                    <input id="countryTags" name="countries" class="form-control" placeholder="Type or select country" value="{{ implode(',', $selectedCountries) }}">
                </div>
                <div class="mb-3 text-end">
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="card mt-5">
    <div class="card-header bg-primary text-white">
        <strong>Academic Interest</strong>
    </div>
    <div class="card-body" id="academicInterestSection">
        <form action="{{ route('student.academic-interest.store') }}" method="POST" class="mt-3">
            @csrf
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <strong>Add New Academic Interest</strong>
                </div>
                <div class="card-body row">
                    <input type="hidden" name="student_id" value="{{ $student->id }}">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Level of study</label>
                            <select class="form-control level-study-select" name="level_study" required>
                                <option value="">Choose one</option>
                                @foreach($listLevelOfStudy as $level)
                                    <option value="{{ $level }}">{{ $level }}</option>
                                @endforeach
                                <option value="Other">Other</option>
                            </select>
                            <input type="text" name="level_study_other" class="form-control mt-2 level-study-other d-none" placeholder="Enter other level of study">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Disciplines</label>
                            <select class="form-control discipline-select" name="discipline" required>
                                <option value="">Choose one</option>
                                @foreach($listDisciplines as $disciplines)
                                    <option value="{{ $disciplines }}">{{ $disciplines }}</option>
                                @endforeach
                                <option value="Other">Other</option>
                            </select>                        
                            <input type="text" name="discipline_other" class="form-control mt-2 discipline-other d-none" placeholder="Enter other discipline">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Programme</label>
                            <input type="text" name="program_type" class="form-control" required placeholder="Programme">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Start Date</label>
                            <input type="text" name="start_date" class="form-control form-month" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Location</label>
                            <input type="text" name="location" class="form-control" required placeholder="Location">
                        </div>
                        <div class="mb-3 text-end">
                            <button type="submit" class="btn btn-primary btn-sm">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        @foreach($student->academicInterests as $interest)
        <div class="card mb-4 position-relative">
            <div class="card-header bg-success text-white d-flex">
                <strong>Academic Interest</strong>
                <form action="{{ route('student.academic-interest.destroy', $interest->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-light text-danger border-0" title="Delete">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </div>
            <div class="card-body">
                <form action="{{ route('student.academic-interest.update',$interest->id) }}" method="POST" class="mt-3 row">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="student_id" value="{{ $student->id }}">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Level of study</label>
                            @php
                                $isCustomLevel = !in_array($interest->level_study, $listLevelOfStudy);
                            @endphp
                            <select class="form-control level-study-select" name="level_study" required>
                                <option value="">Choose one</option>
                                @foreach($listLevelOfStudy as $level)
                                    <option value="{{ $level }}" {{$interest->level_study == $level ? 'selected' : ''}}>{{ $level }}</option>
                                @endforeach
                                <option value="Other" {{ $isCustomLevel ? 'selected' : '' }}>Other</option>
                            </select>
                            <input type="text" 
                                name="level_study_other" 
                                class="form-control mt-2 level-study-other {{ $isCustomLevel ? '' : 'd-none' }}"
                                placeholder="Please specify"
                                value="{{ $isCustomLevel ? $interest->level_study : '' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Disciplines</label>
                             @php
                                $isCustomDiscipline = !in_array($interest->discipline, $listDisciplines);
                            @endphp
                            <select class="form-control discipline-select" name="discipline" required>
                                <option value="">Choose one</option>
                                @foreach($listDisciplines as $disciplines)
                                    <option value="{{ $disciplines }}" {{$interest->discipline == $disciplines ? 'selected' : ''}}>{{ $disciplines }}</option>
                                @endforeach
                                <option value="Other" {{ $isCustomDiscipline ? 'selected' : '' }}>Other</option>
                            </select> 
                            <input type="text" 
                                    name="discipline_other" 
                                    class="form-control mt-2 discipline-other {{ $isCustomDiscipline ? '' : 'd-none' }}"
                                    placeholder="Please specify"
                                    value="{{ $isCustomDiscipline ? $interest->discipline : '' }}">   
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Programme</label>
                            <input type="text" name="program_type" class="form-control" required placeholder="Programme" value="{{ $interest->program_type }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Start Date</label>
                            <input type="text" name="start_date" class="form-control form-month" value="{{ $interest->start_date ? \Carbon\Carbon::parse($interest->start_date)->format('Y-m') : '' }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Location</label>
                            <input type="text" name="location" class="form-control" value="{{$interest->location}}" required placeholder="Location">
                        </div>
                        <div class="mb-3 text-end">
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- <div class="card mt-3">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <th>Country</th>
                    <th>Institution Name</th>
                    <th>Course of Study</th>
                    <th>Level of Study</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Time</th>
                    <th>Grading Score</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @foreach($student->academicHistories as $edu)
                        <tr>
                            <form action="{{ route('student.academic-history.update', $edu->id) }}" method="POST" class="row">
                                @csrf
                                @method('PUT')
                                <td>
                                    <input type="text" name="country" value="{{ $edu->country }}" class="form-control" required placeholder="Country">
                                </td>
                                <td>
                                    <input type="text" name="institution_name" value="{{ $edu->institution_name }}" class="form-control" required placeholder="Institution Name">
                                </td>
                                <td>
                                    <input type="text" name="course_of_study" value="{{ $edu->course_of_study }}" class="form-control" required placeholder="Course of Study">
                                </td>
                                <td>
                                    <input type="text" name="level_of_study" value="{{ $edu->level_of_study }}" class="form-control" required placeholder="Level of Study">
                                </td>
                                <td>
                                    <input type="date" name="start_date" value="{{ $edu->start_date }}" class="form-control" required>
                                </td>
                                <td>
                                    <input type="date" name="end_date" value="{{ $edu->end_date }}" class="form-control" required>
                                </td>
                                <td>
                                    <select name="shift" class="form-control" required>
                                        <option value="Full-time" {{ $edu->shift == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                                        <option value="Part-time" {{ $edu->shift == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                                    </select>                            </td>
                                <td>
                                    <input type="text" name="grading_score" value="{{ $edu->grading_score }}" class="form-control" required placeholder="Grading Score">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-warning btn-sm">Update</button>
                                </td>
                            </form>
                            <td>
                                <form action="{{ route('student.academic-history.destroy', $edu->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this contact?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> -->