@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Edit Document Master</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('master-document.update', $document->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>Document Name *</label>
                    <input type="text" name="document_name" class="form-control" value="{{ $document->document_name }}" required>
                </div>
                <div class="mb-3">
                    <label>Document Type *</label>
                    <select name="document_type" class="form-control" required>
                        <option value="Mandatory" {{ $document->document_type == 'Mandatory' ? 'selected' : '' }}>Mandatory</option>
                        <option value="Additional" {{ $document->document_type == 'Additional' ? 'selected' : '' }}>Additional</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control">{{ $document->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label>Allowed File Type *</label>
                    <input type="text" name="allowed_file_type" class="form-control" value="{{ $document->allowed_file_type }}" required>
                </div>
                <div class="mb-3">
                    <label>Max File Size (KB) *</label>
                    <input type="number" name="max_file_size" class="form-control" value="{{ $document->max_file_size }}" required>
                </div>
                <div class="mb-3">
                    <label>Max Number of Documents *</label>
                    <input type="number" name="max_number_of_documents" class="form-control" value="{{ $document->max_number_of_documents }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('master-document.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection