<form action="{{ route('student.siblings.store') }}" method="POST" class="mt-3">
        @csrf
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <strong>Siblings</strong>
        </div>
        <div class="card-body row">
            <input type="hidden" name="student_id" value="{{ $student->id }}">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required placeholder="Name">
            </div>
            <div class="mb-3">
                <label class="form-label">Gender</label>
                <select class="form-select" name="gender">
                    <option value="">Choose One</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Birth Date</label>
                <input type="text" name="birthdate" class="form-control form-date" required placeholder="Birth Date">
            </div>
            <div class="mb-3 text-end">
                <button type="submit" class="btn btn-primary btn-sm">Add</button>
            </div>
        </div>
    </div>
</form>

<div class="card mt-3">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Birth Date</th>
                    <th>Update</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @foreach($student->siblings as $dt)
                        <tr>
                            <form action="{{ route('student.siblings.update', $dt->id) }}" method="POST" class="row">
                                @csrf
                                @method('PUT')
                                <td><input type="text" name="name" value="{{ $dt->name }}" class="form-control" required placeholder="Name"></td>
                                <td>
                                    <select class="form-select" name="gender">
                                        <option value="">Choose One</option>
                                        <option value="Male" {{ $dt->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ $dt->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                    </select>
                                </td>
                                <td><input type="text" name="birthdate" value="{{ $dt->birthdate }}" class="form-control form-date" required placeholder="Birth Date"></td>
                                <td><button type="submit" class="btn btn-warning btn-sm">Update</button></td>
                            </form>
                            <td>
                                <form action="{{ route('student.siblings.destroy', $dt->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this data?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
