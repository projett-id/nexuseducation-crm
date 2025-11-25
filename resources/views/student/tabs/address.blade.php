@php 
$permanent = $student->addresses->where('type','permanent')->first();
$current = $student->addresses->where('type','current')->first();
@endphp
<div class="row">
    <form action="{{ route('student.address.store') }}" method="POST" class="row">
        @csrf
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <strong>Permanent Address</strong>
                </div>
                <div class="card-body">
                    <input type="hidden" name="student_id" value="{{ $student->id }}">
                    <input type="hidden" name="type[]" value="permanent">

                    <div class="mb-3">
                        <label class="form-label">Country</label>
                        <input type="text" name="country[permanent]" value="{{ old('country.permanent',  $permanent->country ?? '') }}" class="form-control" required placeholder="Country">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address 1</label>
                        <input type="text" name="address_1[permanent]" value="{{ old('address_1.permanent',  $permanent->address_1 ?? '') }}" class="form-control" required placeholder="Address 1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address 2</label>
                        <input type="text" name="address_2[permanent]" value="{{ old('address_2.permanent',  $permanent->address_2 ?? '') }}" class="form-control" placeholder="Address 2">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Postal Code</label>
                        <input type="text" name="post_code[permanent]" value="{{ old('post_code.permanent',  $permanent->post_code ?? '') }}" class="form-control" required placeholder="Post Code">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">State</label>
                        <input type="text" name="state[permanent]" value="{{ old('state.permanent',  $permanent->state ?? '') }}" class="form-control" required placeholder="State">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">City</label>
                        <input type="text" name="city[permanent]" value="{{ old('city.permanent',  $permanent->city ?? '') }}" class="form-control" required placeholder="City">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <strong>Current Address</strong>
                </div>
                <div class="card-body">
                    <input type="hidden" name="type[]" value="current">

                    <div class="mb-3">
                        <label class="form-label">Country</label>
                        <input type="text" name="country[current]" value="{{ old('country.current',$current->country ?? '') }}" class="form-control" placeholder="Country">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address 1</label>
                        <input type="text" name="address_1[current]" value="{{ old('address_1.current',$current->address_1 ?? '') }}" class="form-control" placeholder="Address 1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address 2</label>
                        <input type="text" name="address_2[current]" value="{{ old('address_2.current',$current->address_2 ?? '') }}" class="form-control" placeholder="Address 2">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Postal Code</label>
                        <input type="text" name="post_code[current]" value="{{ old('post_code.current',$current->post_code ?? '') }}" class="form-control" placeholder="Post Code">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">State</label>
                        <input type="text" name="state[current]" value="{{ old('state.current',$current->state ?? '') }}" class="form-control" placeholder="State">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">City</label>
                        <input type="text" name="city[current]" value="{{ old('city.current',$current->city ?? '') }}" class="form-control" placeholder="City">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 text-end">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
