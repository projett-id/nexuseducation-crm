@php
    $mandatoryDocs = $documentMasters->where('document_type', 'Mandatory');
    $additionalDocs = $documentMasters->where('document_type', 'Additional');
@endphp

<h5>Mandatory Documents</h5>
@foreach($mandatoryDocs as $master)
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            {{ $master->document_name }}
        </div>
        <div class="card-body">
            @php
                $uploadedDocs = $student->documents->where('document_master_id', $master->id);
            @endphp
            @if($uploadedDocs->count())
                <div class="mb-2">
                    <strong>Uploaded Files:</strong>
                    <ul>
                        @foreach($uploadedDocs as $uploaded)
                            <li class="mb-2">
                                <a href="{{ asset('storage/' . $uploaded->file_path) }}" target="_blank">{{ basename($uploaded->file_path) }}</a>
                                <form action="{{ route('student.document.destroy', $uploaded->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this file?')">Delete</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if($uploadedDocs->count() < $master->max_number_of_documents)
                <form action="{{ route('student.document.store') }}" method="POST" enctype="multipart/form-data" class="auto-upload-form">
                    @csrf
                    <input type="hidden" name="student_id" value="{{ $student->id }}">
                    <input type="hidden" name="document_master_id" value="{{ $master->id }}">
                    <div class="mb-3">
                        <label class="form-label">Upload File</label>
                        <input type="file" name="file_path" class="form-control" required>
                    </div>
                    <small>Extension allowed: {{$master->allowed_file_type}}, with max file: {{$master->max_file_size}}MB</small>
                </form>
            @else
                <div class="alert alert-info">Maximum number of files uploaded ({{ $master->max_number_of_documents }}).</div>
            @endif
        </div>
    </div>
@endforeach

<h5>Additional Documents</h5>
@foreach($additionalDocs as $master)
    <div class="card mb-3">
        <div class="card-header bg-secondary text-white">
            {{ $master->document_name }}
        </div>
        <div class="card-body">
            @php
                $uploadedDocs = $student->documents->where('document_master_id', $master->id);
            @endphp
            @if($uploadedDocs->count())
                <div class="mb-2">
                    <strong>Uploaded Files:</strong>
                    <ul>
                        @foreach($uploadedDocs as $uploaded)
                            <li class="mb-2">
                                <a href="{{ asset('storage/' . $uploaded->file_path) }}" target="_blank">{{ basename($uploaded->file_path) }}</a>
                                <form action="{{ route('student.document.destroy', $uploaded->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this file?')">Delete</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if($uploadedDocs->count() < $master->max_number_of_documents)
                <form action="{{ route('student.document.store') }}" method="POST" enctype="multipart/form-data" class="auto-upload-form">
                    @csrf
                    <input type="hidden" name="student_id" value="{{ $student->id }}">
                    <input type="hidden" name="document_master_id" value="{{ $master->id }}">
                    <div class="mb-3">
                        <label class="form-label">Upload File</label>
                        <input type="file" name="file_path" class="form-control" required>
                    </div>
                    <small>Extension allowed: {{$master->allowed_file_type}}, with max file: {{$master->max_file_size}}MB</small>
                </form>
            @else
                <div class="alert alert-info">Maximum number of files uploaded ({{ $master->max_number_of_documents }}).</div>
            @endif
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