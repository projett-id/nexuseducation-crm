@php
    $selectedCountries = $student->destinationStudies->pluck('country')->toArray();
@endphp
<form action="{{ route('student.applications.store') }}" method="POST" class="mt-3">
    @csrf
    <input type="hidden" name="student_id" value="{{ $student->id }}">
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <strong>Applications Form</strong>
        </div>
        <div class="card-body row">
            <input type="hidden" name="student_id" value="{{ $student->id }}">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Country</label>
                    <input id="countryTagsApplication" name="country" class="form-control" placeholder="Type or select country" autocomplete="false">
                </div>
                <div class="mb-3">
                    <label class="form-label">Institution Name</label>
                    <input type="text" name="institution_name" class="form-control" required placeholder="Institution Name">
                </div>
            </div>
            <div class="col-md-6">
                 <div class="mb-3">
                    <label class="form-label">Level of study</label>
                    <select class="form-control" name="level_of_study" required>
                        <option value="">Choose one</option>
                        @foreach($listLevelOfStudy as $level)
                            <option value="{{ $level }}">{{ $level }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Programme</label>
                    <input type="text" name="programme" class="form-control" required placeholder="Programme">
                </div>
                <div class="mb-3 text-end">
                    <button type="submit" class="btn btn-primary btn-sm">Add</button>
                </div>
            </div>
        </div>
    </div>
</form>