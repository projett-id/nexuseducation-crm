<form action="{{ route('student.emergency-contact.store') }}" method="POST" class="mt-3">
        @csrf
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <strong>Emergency Contact</strong>
        </div>
        <div class="card-body row">
            <input type="hidden" name="student_id" value="{{ $student->id }}">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" required placeholder="Name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Relationship</label>
                    <input type="text" name="relationship" class="form-control" required placeholder="Relationship">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" required placeholder="Phone Number">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required placeholder="Email">
                </div>
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
                    <th>Name</th>
                    <th>Relationship</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Update</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @foreach($student->emergencyContacts as $contact)
                        <tr>
                            <form action="{{ route('student.emergency-contact.update', $contact->id) }}" method="POST" class="row">
                                @csrf
                                @method('PUT')
                                <td><input type="text" name="name" value="{{ $contact->name }}" class="form-control" required placeholder="Name"></td>
                                <td><input type="text" name="relationship" value="{{ $contact->relationship }}" class="form-control" required placeholder="Relationship"></td>
                                <td><input type="text" name="phone_number" value="{{ $contact->phone_number }}" class="form-control" required placeholder="Phone Number"></td>
                                <td><input type="email" name="email" value="{{ $contact->email }}" class="form-control" required placeholder="Email"></td>
                                <td><button type="submit" class="btn btn-warning btn-sm">Update</button></td>
                            </form>
                            <td>
                                <form action="{{ route('student.emergency-contact.destroy', $contact->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this contact?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>