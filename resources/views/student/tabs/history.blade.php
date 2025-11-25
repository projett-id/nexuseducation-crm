@foreach($student->applications as $dt)
<div class="card mb-4">
    <div class="card-header bg-primary text-white">
        <strong>{{$dt->start_date ? '['.\Carbon\Carbon::parse($dt->start_date)->format('Y-m').']': ''}} {{ $dt->country }} - {{ $dt->institution_name }} - {{ $dt->level_of_study }} - {{ $dt->programme }}</strong>
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
                <th>Attachment</th>
                <th>Date</th>
            </thead>
            <tbody>
                @foreach($dt->histories as $ht)
                    <tr>
                        <td>{{ $ht->status }}</td>
                        <td>{{ $ht->note }}</td>
                        <td>
                        <a href="{{ asset('storage/' . $ht->attachment) }}" target="_blank">View Files</a>    
                        </td>
                        <td>{{ $ht->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endforeach