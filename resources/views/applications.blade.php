@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-body row">
        <div class="table-responsive">
            <table class="table table-bordered datatables">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Agent Name</th>
                        <th>Agent Company</th>
                        <th>Country</th>
                        <th>Institution</th>
                        <th>Level of Study</th>
                        <th>Programme</th>
                        <th>Last Status</th>
                        <th>Last Updated</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($applications as $dt)
                    <tr>
                        <td>{{ $dt->students->first_name }}</td>
                        <td>{{ $dt->students->agent_name }}</td>
                        <td>{{ $dt->students->agent_company }}</td>
                        <td>{{ $dt->country }}</td>
                        <td>{{ $dt->institution_name }}</td>
                        <td>{{ $dt->level_of_study }}</td>
                        <td>{{ $dt->programme }}</td>
                        <td>{{ $dt->last_status ?? '-' }}</td>
                        <td>{{ $dt->updated_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection