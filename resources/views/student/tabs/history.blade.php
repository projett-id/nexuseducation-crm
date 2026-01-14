@foreach($student->applications as $dt)
<div class="card mb-4">
    <div class="card-header bg-primary text-white d-flex">
        <strong>
            {{$dt->start_date ? '['.\Carbon\Carbon::parse($dt->start_date)->format('Y-m').']' : ''}}
            {{ $dt->country }} - {{ $dt->institution_name }} - {{ $dt->level_of_study }} - {{ $dt->programme }}
        </strong>

        <form action="{{ route('student.applications.destroy', $dt->id) }}" method="POST"
            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">
                <i class="bi bi-trash"></i>
            </button>
        </form>
    </div>

    <div class="card-body row">
        <form action="{{ route('student.history-applications.store') }}" method="POST" class="col-md-12 mb-3" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="application_id" value="{{ $dt->id }}"/>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <input type="text" name="status" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Note</label>
                <textarea name="note" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Attachment</label>
                <input type="file" name="attachment" required>
            </div>
            <div class="mb-3">
                <input type="submit" value="Update" class="btn btn-primary">
            </div>
        </form>
        <table class="table table-bordered table-striped datatables">
            <thead>
                <th>Status</th>
                <th>Note</th>
                <th colspan="2">Attachment</th>
                <th>Date</th>
                <th>Delete</th>
            </thead>
            <tbody>
                @foreach($dt->histories as $ht)
                    <tr>
                        <td>{{ $ht->status }}</td>
                        <td>{{ $ht->note }}</td>
                        <td>
                            <form action="{{ route('student.application.update.docs',['id'=>$ht->id]) }}" method="POST" enctype="multipart/form-data" class="auto-upload-form">
                                @csrf 
                                @method('PUT')
                                <input type="file" name="attachment">
                            </form>
                        </td>
                        <td>
                            <a href="{{ asset('storage/' . $ht->attachment) }}" target="_blank"><i class="bi bi-eye"></i></a>    
                        </td>
                        <td>{{ $ht->created_at }}</td>
                        <td>
                            <form action="{{ route('student.history-applications.destroy', $ht->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endforeach

<script>
document.querySelectorAll('.auto-upload-form input[type="file"]').forEach(function(input) {
    input.addEventListener('change', function() {
        if (input.files.length > 0) {
            input.closest('form').submit();
        }
    });
});
</script>