<div class="card mb-4">
    <div class="card-header bg-primary text-white">
        <strong>Personal</strong>
    </div>
    <div class="card-body row">
        <div class="col-md-6">
            <div class="mb-3">
                <label>First Name *</label>
                <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $student->first_name ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label>Family Name *</label>
                <input type="text" name="family_name" class="form-control" value="{{ old('family_name', $student->family_name ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label>Email *</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $student->email ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label>Phone Number *</label>
                <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $student->phone_number ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label>Date of Birth *</label>
                <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth', $student->date_of_birth ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label>Gender *</label>
                <input type="text" name="gender" class="form-control" value="{{ old('gender', $student->gender ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label>Nationality *</label>
                <input type="text" name="nationality" class="form-control" value="{{ old('nationality', $student->nationality ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label>Country of Birth *</label>
                <input type="text" name="country_of_birth" class="form-control" value="{{ old('country_of_birth', $student->country_of_birth ?? '') }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label>Native Language</label>
                <input type="text" name="native_language" class="form-control" value="{{ old('native_language', $student->native_language ?? '') }}">
            </div>
            <div class="mb-3">
                <label>Name on Passport</label>
                <input type="text" name="passport_name" class="form-control" value="{{ old('passport_name', $student->passport_name ?? '') }}">
            </div>
            <div class="mb-3">
                <label>Passport Issue Location</label>
                <input type="text" name="passport_issue_location" class="form-control" value="{{ old('passport_issue_location', $student->passport_issue_location ?? '') }}">
            </div>
            <div class="mb-3">
                <label>Passport Number</label>
                <input type="text" name="passport_number" class="form-control" value="{{ old('passport_number', $student->passport_number ?? '') }}">
            </div>
            <div class="mb-3">
                <label>Passport Issue Date</label>
                <input type="date" name="passport_issue_date" class="form-control" value="{{ old('passport_issue_date', $student->passport_issue_date ?? '') }}">
            </div>
            <div class="mb-3">
                <label>Passport Expiry Date</label>
                <input type="date" name="passport_expiry_date" class="form-control" value="{{ old('passport_expiry_date', $student->passport_expiry_date ?? '') }}">
            </div>
        </div>
    </div>
</div>