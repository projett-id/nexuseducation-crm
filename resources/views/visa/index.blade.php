@extends('admin.layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container">
    <h3 class="mb-4">Visa Applications</h3>

    <a href="{{ route('visa.create') }}" class="btn btn-primary mb-3">Create</a>

    <div class="card">
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Mobile Phone</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th width="170">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $v)
                    <tr>
                        <td>{{ $v->name }}</td>
                        <td>{{ $v->mobile_phone }}</td>
                        <td>{{ $v->email }}</td>
                        <td>{{ $v->created_at }}</td>
                        <td>
                            <a href="{{ route('visa.edit', $v->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('visa.destroy', $v->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Delete this data?');">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-danger">
                                    Delete
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $data->links() }}

        </div>
    </div>
</div>
@endsection
