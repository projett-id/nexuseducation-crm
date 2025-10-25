<form action="{{ route('student.work-detail.store') }}" method="POST" class="mt-3">
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
            <input type="text" name="job_title" class="form-control" required placeholder="Job Title">
                </div>
                <div class="mb-3">
                    <label class="form-label">Institution Name</label>
            <input type="text" name="company" class="form-control" required placeholder="Company">
                </div>
                <div class="mb-3">
                    <label class="form-label">Course of Study</label>
            <input type="text" name="address" class="form-control" required placeholder="Address">
                </div>
                <div class="mb-3">
                    <label class="form-label">Level of Study</label>
            <input type="text" name="phone_number" class="form-control" placeholder="Phone Number">
                </div>
            </div>
            <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Start Date</label>
                    <input type="date" name="start_date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">End Date</label>
                    <input type="date" name="end_date" class="form-control">
                </div>
                <input type="checkbox" name="currently_working" value="1"> Currently Working Here
                <div class="mb-3 text-end">
                    <button type="submit" class="btn btn-primary btn-sm">Add</button>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="card mt-3">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <th>Job Title</th>
                    <th>Company</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @foreach($student->workDetails as $work)
                        <tr>
                            <form action="{{ route('student.work-detail.update', $work->id) }}" method="POST" class="row">
                                @csrf
                                @method('PUT')
                                <td>
                                    <input type="text" name="job_title" value="{{ $work->job_title }}" class="form-control" required placeholder="Job Title">
                                </td>
                                <td>
                                    <input type="text" name="company" value="{{ $work->company }}" class="form-control" required placeholder="Company">
                                </td>
                                <td>
                                    <input type="text" name="address" value="{{ $work->address }}" class="form-control" required placeholder="Address">
                                </td>
                                <td>
                                    <input type="text" name="phone_number" value="{{ $work->phone_number }}" class="form-control" placeholder="Phone Number">
                                </td>
                                <td>
                                    <input type="date" name="start_date" value="{{ $work->start_date }}" class="form-control" required>
                                </td>
                                <td>
                                    @if($work->currently_working)
                                        <input type="date" name="end_date" value="{{ date('Y-m-d') }}" class="form-control">
                                        <small><i>Current</i></small>
                                    @else
                                        <input type="date" name="end_date" value="{{ $work->end_date }}" class="form-control">
                                    @endif
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-warning btn-sm">Update</button>
                                </td>
                            </form>
                            <td>
                                <form action="{{ route('student.work-detail.destroy', $work->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this experience?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>