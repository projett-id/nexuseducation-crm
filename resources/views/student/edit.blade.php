@extends('admin.layouts.app')
@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
@endpush
@section('content')
<div class="container">
    <h2>Update Student</h2>
        <ul class="nav nav-tabs" id="studentTab" role="tablist">
            <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#personal" type="button" role="tab">Personal</button></li>
            <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#student-address" type="button" role="tab">Address</button></li>
            <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#emergency" type="button" role="tab">Emergency Contact</button></li>
            <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#education" type="button" role="tab">Education</button></li>
            <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#work-detail" type="button" role="tab">Work Detail</button></li>
            <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#applications" type="button" role="tab">Applications</button></li>
            <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#history" type="button" role="tab">History</button></li>

            <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#document" type="button" role="tab">Document</button></li>
        </ul>
        <div class="tab-content mt-3" id="studentTabContent">
            <div class="tab-pane fade show active" id="personal" role="tabpanel">
                <form action="{{ route('student.update', $student->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('student.tabs.personal')
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
            <div class="tab-pane fade" id="student-address" role="tabpanel">@include('student.tabs.address')</div>
            <div class="tab-pane fade" id="emergency" role="tabpanel">@include('student.tabs.emergency')</div>
            <div class="tab-pane fade" id="education" role="tabpanel">@include('student.tabs.education')</div>
            <div class="tab-pane fade" id="work-detail" role="tabpanel">@include('student.tabs.work')</div>
            <div class="tab-pane fade" id="document" role="tabpanel">@include('student.tabs.document')</div>
            <div class="tab-pane fade" id="applications" role="tabpanel">@include('student.tabs.applications')</div>
            <div class="tab-pane fade" id="history" role="tabpanel">@include('student.tabs.history')</div>
        </div>
</div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
  // Daftar country bisa kamu ambil dari database Laravel nanti
  const countries = @json($countries);

  const input = document.querySelector('#countryTags');
  const tagify = new Tagify(input, {
    whitelist: countries,
    dropdown: {
      maxItems: 5,
      classname: "tags-look",
      enabled: 1, // 0 = show on focus
      closeOnSelect: false
    }
  });

  const inputCountryApplication = document.querySelector('#countryTagsApplication');
  const tagifyCountryApplication = new Tagify(inputCountryApplication, {
    whitelist: countries,
    maxTags:1,
    dropdown: {
      max:1,
      maxItems: 5,
      classname: "tags-look",
      enabled: 1, // 0 = show on focus
      closeOnSelect: false
    }
  });

  
});
</script>

@endpush