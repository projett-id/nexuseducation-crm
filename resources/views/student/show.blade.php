@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Detail Mahasiswa</h2>
    <table class="table">
        <tr><th>Nama Depan</th><td>{{ $student->first_name }}</td></tr>
        <tr><th>Nama Keluarga</th><td>{{ $student->family_name }}</td></tr>
        <tr><th>Email</th><td>{{ $student->email }}</td></tr>
        <tr><th>Telepon</th><td>{{ $student->phone_number }}</td></tr>
        <tr><th>Tanggal Lahir</th><td>{{ $student->date_of_birth }}</td></tr>
        <tr><th>Gender</th><td>{{ $student->gender }}</td></tr>
        <tr><th>Kewarganegaraan</th><td>{{ $student->nationality }}</td></tr>
        <tr><th>Negara Lahir</th><td>{{ $student->country_of_birth }}</td></tr>
        <tr><th>Bahasa Asli</th><td>{{ $student->native_language }}</td></tr>
        <tr><th>Nama di Paspor</th><td>{{ $student->passport_name }}</td></tr>
        <tr><th>Lokasi Terbit Paspor</th><td>{{ $student->passport_issue_location }}</td></tr>
        <tr><th>Nomor Paspor</th><td>{{ $student->passport_number }}</td></tr>
        <tr><th>Tanggal Terbit Paspor</th><td>{{ $student->passport_issue_date }}</td></tr>
        <tr><th>Tanggal Expired Paspor</th><td>{{ $student->passport_expiry_date }}</td></tr>
    </table>
    <a href="{{ route('student.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection