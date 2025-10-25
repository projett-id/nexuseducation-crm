@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Add Student</h2>
        <ul class="nav nav-tabs" id="studentTab" role="tablist">
            <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#personal" type="button" role="tab">Personal</button></li>
        </ul>
        <div class="tab-content mt-3" id="studentTabContent">
            <div class="tab-pane fade show active" id="personal" role="tabpanel">
                <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('student.tabs.personal')
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
</div>
@endsection