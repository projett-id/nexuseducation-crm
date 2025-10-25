@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header bg-white">
        <div class="card-tools">
            <a href="{{ route('student.create') }}" class="btn btn-primary">Add Student</a>        
        </div>
    </div>
    <div class="card-body row">
        <div class="table-responsive">
            <table class="table table-bordered datatables">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Family Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>{{ $student->first_name }}</td>
                        <td>{{ $student->family_name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone_number }}</td>
                        <td>
                            <a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('student.destroy', $student->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection