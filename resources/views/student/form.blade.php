<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Nama Depan</label>
            <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $student->first_name ?? '') }}" required>
        </div>
        <div class="form-group">
            <label>Nama Keluarga</label>
            <input type="text" name="family_name" class="form-control" value="{{ old('family_name', $student->family_name ?? '') }}" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $student->email ?? '') }}" required>
        </div>
        <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $student->phone_number ?? '') }}" required>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth', $student->date_of_birth ?? '') }}" required>
        </div>
        <div class="form-group">
            <label>Gender</label>
            <input type="text" name="gender" class="form-control" value="{{ old('gender', $student->gender ?? '') }}" required>
        </div>
        <div class="form-group">
            <label>Kewarganegaraan</label>
            <input type="text" name="nationality" class="form-control" value="{{ old('nationality', $student->nationality ?? '') }}" required>
        </div>
        <div class="form-group">
            <label>Negara Lahir</label>
            <input type="text" name="country_of_birth" class="form-control" value="{{ old('country_of_birth', $student->country_of_birth ?? '') }}" required>
        </div>
        <div class="form-group">
            <label>Bahasa Asli</label>
            <input type="text" name="native_language" class="form-control" value="{{ old('native_language', $student->native_language ?? '') }}">
        </div>
        <div class="form-group">
            <label>Nama di Paspor</label>
            <input type="text" name="passport_name" class="form-control" value="{{ old('passport_name', $student->passport_name ?? '') }}">
        </div>
        <div class="form-group">
            <label>Lokasi Terbit Paspor</label>
            <input type="text" name="passport_issue_location" class="form-control" value="{{ old('passport_issue_location', $student->passport_issue_location ?? '') }}">
        </div>
        <div class="form-group">
            <label>Nomor Paspor</label>
            <input type="text" name="passport_number" class="form-control" value="{{ old('passport_number', $student->passport_number ?? '') }}">
        </div>
        <div class="form-group">
            <label>Tanggal Terbit Paspor</label>
            <input type="date" name="passport_issue_date" class="form-control" value="{{ old('passport_issue_date', $student->passport_issue_date ?? '') }}">
        </div>
        <div class="form-group">
            <label>Tanggal Expired Paspor</label>
            <input type="date" name="passport_expiry_date" class="form-control" value="{{ old('passport_expiry_date', $student->passport_expiry_date ?? '') }}">
        </div>
    </div>
</div>