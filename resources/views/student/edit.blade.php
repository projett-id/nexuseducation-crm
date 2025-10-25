@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Update Student</h2>
        <ul class="nav nav-tabs" id="studentTab" role="tablist">
            <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#personal" type="button" role="tab">Personal</button></li>
            <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#student-address" type="button" role="tab">Address</button></li>
            <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#emergency" type="button" role="tab">Emergency Contact</button></li>
            <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#education" type="button" role="tab">Education</button></li>
            <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#work-detail" type="button" role="tab">Work Detail</button></li>
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
        </div>
</div>
@endsection