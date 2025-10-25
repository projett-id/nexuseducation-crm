@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Document Master List</h2>
    <a href="{{ route('master-document.create') }}" class="btn btn-primary mb-3">Add Document Master</a>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered datatables">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Allowed File Type</th>
                            <th>Max File Size</th>
                            <th>Max Number</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($documents as $doc)
                        <tr>
                            <td>{{ $doc->document_name }}</td>
                            <td>{{ $doc->document_type }}</td>
                            <td>{{ $doc->allowed_file_type }}</td>
                            <td>{{ $doc->max_file_size }}MB</td>
                            <td>{{ $doc->max_number_of_documents }} File</td>
                            <td>
                                <a href="{{ route('master-document.edit', $doc->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('master-document.destroy', $doc->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this document master?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection