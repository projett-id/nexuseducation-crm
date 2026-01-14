@extends('admin.layouts.app')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container">

    <h3 class="mb-4">Visa Application Form</h3>

    <form action="{{ route('visa.store') }}" method="POST" class="card p-4">
        @csrf

        <!-- BOOTSTRAP 5 TABS -->
            {{-- ------------------------------------------------------
                TAB 1: PERSONAL INFORMATION
            ------------------------------------------------------ --}}
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Name*</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Birth Place</label>
                    <input type="text" name="birth_place" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Birth Date</label>
                    <input type="text" name="birth_date" class="form-control form-date">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Marital Status</label>
                    <select name="marital_status" class="form-control">
                        <option>Single</option>
                        <option>Married</option>
                        <option>Divorced</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Home Phone</label>
                    <input type="text" name="home_phone" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Mobile Phone</label>
                    <input type="text" name="mobile_phone" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>E-mail</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Education School</label>
                    <input type="text" name="education_school" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Education Major</label>
                    <input type="text" name="education_major" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Province</label>
                    <input type="text" name="province" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>City</label>
                    <input type="text" name="city" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Postal Code</label>
                    <input type="text" name="postal_code" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>District</label>
                    <input type="text" name="district" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Sub-District</label>
                    <input type="text" name="sub_district" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Address</label>
                    <textarea name="address" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label>Company Name</label>
                    <input type="text" name="company_name" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Address</label>
                    <input type="text" name="company_address" class="form-control">
                </div>
                <div class="mb-3">
                    <label>City</label>
                    <input type="text" name="company_city" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Province</label>
                    <input type="text" name="company_province" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Postal Code</label>
                    <input type="text" name="company_postal_code" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Job Position</label>
                    <input type="text" name="job_position" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Phone</label>
                    <input type="text" name="company_phone" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Period</label>
                    <input type="text" name="employment_start" class="form-control form-date">
                </div>

                <div class="mb-3">
                    <label>Coworker Name</label>
                    <input type="text" name="coworker_name" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Coworker Phone</label>
                    <input type="text" name="coworker_phone" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Spouse Name</label>
                    <input type="text" name="spouse_name" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Spouse Birth Date</label>
                    <input type="text" name="spouse_birth_date" class="form-control form-date">
                </div>

                <div class="mb-3">
                    <label>Child Name</label>
                    <input type="text" name="child_name" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Child Birth Date</label>
                    <input type="text" name="child_birth_date" class="form-control form-date">
                </div>

                <div class="mb-3">
                    <label>Father Name</label>
                    <input type="text" name="father_name" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Father Birth Date</label>
                    <input type="text" name="father_birth_date" class="form-control form-date">
                </div>

                <div class="mb-3">
                    <label>Mother Name</label>
                    <input type="text" name="mother_name" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Mother Birth Date</label>
                    <input type="text" name="mother_birth_date" class="form-control form-date">
                </div>

                <div class="mb-3">
                    <label>Relative Name</label>
                    <input type="text" name="relative_name" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Relationship</label>
                    <input type="text" name="relative_relationship" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Mobile Phone</label>
                    <input type="text" name="relative_phone" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="relative_email" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Active Visa (if any)</label>
                    <textarea name="active_visa" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label>Previously Rejected?</label>
                    <select name="visa_rejected" class="form-control">
                        <option>No</option>
                        <option>Yes</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Reason for Rejection</label>
                    <textarea name="visa_reject_reason" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label>Travel History (Last 12 Months)</label>
                    <textarea name="travel_history" class="form-control"></textarea>
                </div>
            </div>
        <div class="text-end mt-4" style="bottom: 20px; z-index: 99;">
            <input type="submit" value="Submit" class="btn btn-success px-5 py-2 shadow"/>
        </div>
    </form>
</div>
@endsection
