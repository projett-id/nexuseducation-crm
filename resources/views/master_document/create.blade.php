@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Add Document Master</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('master-document.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Document Name *</label>
                    <input type="text" name="document_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Form Type *</label>
                    <select name="document_type" class="form-control" required>
                        <option value="">Choose One</option>
                        <option value="General">General</option>
                        <option value="Student">Student</option>
                        <option value="Visa">Visa</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Document Type *</label>
                    <select name="document_type" class="form-control" required>
                        <option value="">Choose One</option>
                        <option value="Mandatory">Mandatory</option>
                        <option value="Additional">Additional</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label>Allowed File Type *</label>
                    <input type="text" name="allowed_file_type" class="form-control" required value="PDF,DOC,DOCX,PNG,JPEG,JPG">
                </div>
                <div class="mb-3">
                    <label>Max File Size (MB) *</label>
                    <input type="number" name="max_file_size" class="form-control" required value="5">
                </div>
                <div class="mb-3">
                    <label>Max Number of Documents *</label>
                    <input type="number" name="max_number_of_documents" class="form-control" required value="1">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('master-document.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection