@extends('admin.layouts.app')
@section('content')
<div class="container">

    <h3 class="mb-4">Visa Application Form</h3>

    <form action="{{ route('visa.update',$visa->id) }}" method="POST" class="card p-4">
        @csrf

        <!-- BOOTSTRAP 5 TABS -->
        <ul class="nav nav-tabs mb-4" id="visaTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal" type="button">
                    Personal Info
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="employment-tab" data-bs-toggle="tab" data-bs-target="#employment" type="button">
                    Employment
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="family-tab" data-bs-toggle="tab" data-bs-target="#family" type="button">
                    Family
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button">
                    Relative
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="visa-tab" data-bs-toggle="tab" data-bs-target="#visa" type="button">
                    Visa Info
                </button>
            </li>
        </ul>

        <div class="tab-content" id="visaTabContent">

            {{-- ------------------------------------------------------
                TAB 1: PERSONAL INFORMATION
            ------------------------------------------------------ --}}
            <div class="tab-pane fade show active" id="personal" role="tabpanel">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Name*</label>
                        <input type="text" value="{{$visa->name}}" name="name" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Birth Place</label>
                        <input type="text" value="{{$visa->birth_place}}" name="birth_place" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Birth Date</label>
                        <input type="text" value="{{$visa->birth_date}}" name="birth_date" class="form-control form-date">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Marital Status</label>
                        <select name="marital_status" class="form-control">
                            <option value=""></option>
                            <option value="Single" {{$visa->marital_status == "Single" ? 'selected' : ''}}>Single</option>
                            <option value="Married" {{$visa->marital_status == "Married" ? 'selected' : ''}}>Married</option>
                            <option value="Divorced" {{$visa->marital_status == "Divorced" ? 'selected' : ''}}>Divorced</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Home Phone</label>
                        <input type="text" value="{{$visa->home_phone}}" name="home_phone" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Mobile Phone</label>
                        <input type="text" value="{{$visa->mobile_phone}}" name="mobile_phone" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>E-mail</label>
                        <input type="email" value="{{$visa->email}}" name="email" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Education School</label>
                        <input type="text" value="{{$visa->education_school}}" name="education_school" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Education Major</label>
                        <input type="text" value="{{$visa->education_major}}" name="education_major" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Province</label>
                        <input type="text" value="{{$visa->province}}" name="province" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>City</label>
                        <input type="text" value="{{$visa->city}}" name="city" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Postal Code</label>
                        <input type="text" value="{{$visa->postal_code}}" name="postal_code" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>District</label>
                        <input type="text" value="{{$visa->district}}" name="district" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Sub-District</label>
                        <input type="text" value="{{$visa->sub_district}}" name="sub_district" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Address</label>
                        <textarea name="address" class="form-control">{{$visa->address}}</textarea>
                    </div>
                </div>
            </div>


            {{-- ------------------------------------------------------
                TAB 2: EMPLOYMENT INFORMATION
            ------------------------------------------------------ --}}
            <div class="tab-pane fade" id="employment" role="tabpanel">
                <div class="mb-3">
                    <label>Company Name</label>
                    <input type="text" value="{{$visa->company_name}}" name="company_name" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Address</label>
                    <input type="text" value="{{$visa->company_address}}" name="company_address" class="form-control">
                </div>
                <div class="mb-3">
                    <label>City</label>
                    <input type="text" value="{{$visa->company_city}}" name="company_city" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Province</label>
                    <input type="text" value="{{$visa->company_province}}" name="company_province" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Postal Code</label>
                    <input type="text" value="{{$visa->company_postal_code}}" name="company_postal_code" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Job Position</label>
                    <input type="text" value="{{$visa->job_position}}" name="job_position" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Phone</label>
                    <input type="text" value="{{$visa->company_phone}}" name="company_phone" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Period</label>
                    <input type="text" value="{{$visa->employment_start}}" name="employment_start" class="form-control form-date">
                </div>

                <div class="mb-3">
                    <label>Coworker Name</label>
                    <input type="text" value="{{$visa->coworker_name}}" name="coworker_name" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Coworker Phone</label>
                    <input type="text" value="{{$visa->coworker_phone}}" name="coworker_phone" class="form-control">
                </div>
            </div>


            {{-- ------------------------------------------------------
                TAB 3: FAMILY INFORMATION
            ------------------------------------------------------ --}}
            <div class="tab-pane fade" id="family" role="tabpanel">
                <h5 class="mb-3">Family Information</h5>

                <div class="mb-3">
                    <label>Spouse Name</label>
                    <input type="text" value="{{$visa->spouse_name}}" name="spouse_name" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Spouse Birth Date</label>
                    <input type="text" value="{{$visa->spouse_birth_date}}" name="spouse_birth_date" class="form-control form-date">
                </div>

                <div class="mb-3">
                    <label>Child Name</label>
                    <input type="text" value="{{$visa->child_name}}" name="child_name" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Child Birth Date</label>
                    <input type="text" value="{{$visa->child_birth_date}}" name="child_birth_date" class="form-control form-date">
                </div>

                <div class="mb-3">
                    <label>Father Name</label>
                    <input type="text" value="{{$visa->father_name}}" name="father_name" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Father Birth Date</label>
                    <input type="text" value="{{$visa->father_birth_date}}" name="father_birth_date" class="form-control form-date">
                </div>

                <div class="mb-3">
                    <label>Mother Name</label>
                    <input type="text" value="{{$visa->mother_name}}" name="mother_name" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Mother Birth Date</label>
                    <input type="text" value="{{$visa->mother_birth_date}}" name="mother_birth_date" class="form-control form-date">
                </div>
            </div>


            {{-- ------------------------------------------------------
                TAB 4: RELATIVE
            ------------------------------------------------------ --}}
            <div class="tab-pane fade" id="contact" role="tabpanel">
                <h5 class="mb-3">Relative</h5>
                <div class="mb-3">
                    <label>Relative Name</label>
                    <input type="text" value="{{$visa->relative_name}}" name="relative_name" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Relationship</label>
                    <input type="text" value="{{$visa->relative_relationship}}" name="relative_relationship" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Mobile Phone</label>
                    <input type="text" value="{{$visa->relative_phone}}" name="relative_phone" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" value="{{$visa->relative_email}}" name="relative_email" class="form-control">
                </div>
            </div>


            {{-- ------------------------------------------------------
                TAB 5: VISA INFORMATION
            ------------------------------------------------------ --}}
            <div class="tab-pane fade" id="visa" role="tabpanel">
                <h5 class="mb-3">Visa Information</h5>

                <div class="mb-3">
                    <label>Active Visa (if any)</label>
                    <textarea name="active_visa" class="form-control">{{$visa->active_visa}}</textarea>
                </div>

                <div class="mb-3">
                    <label>Previously Rejected?</label>
                    <select value="{{$visa->visa_rejected}}" name="visa_rejected" class="form-control">
                        <option>No</option>
                        <option>Yes</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Reason for Rejection</label>
                    <textarea name="visa_reject_reason" class="form-control">{{$visa->visa_reject_reason}}</textarea>
                </div>

                <div class="mb-3">
                    <label>Travel History (Last 12 Months)</label>
                    <textarea name="travel_history" class="form-control">{{$visa->travel_history}}</textarea>
                </div>
            </div>

        </div>
        <div class="text-end mt-4 position-sticky" style="bottom: 20px; z-index: 99;">
            <input type="submit" value="Submit" class="btn btn-success px-5 py-2 shadow"/>
        </div>
    </form>

</div>
@endsection
