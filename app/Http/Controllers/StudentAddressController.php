<?php

namespace App\Http\Controllers;

use App\Models\StudentAddress;
use Illuminate\Http\Request;

class StudentAddressController extends Controller
{
    public function store(Request $request)
    {
        foreach ($request->type as $type) {
            if($request->country[$type] !=""){
                StudentAddress::updateOrCreate(
                    ['student_id' => $request->student_id, 'type' => $type],
                    [
                        'country'    => $request->country[$type],
                        'address_1'  => $request->address_1[$type],
                        'address_2'  => $request->address_2[$type],
                        'post_code'  => $request->post_code[$type],
                        'state'      => $request->state[$type],
                        'city'       => $request->city[$type],
                    ]
                );
            }
        }
        return back()->with('success', 'Address added.');
    }

    public function update(Request $request, $id)
    {
        $address = StudentAddress::findOrFail($id);
        $validated = $request->validate([
            'type' => 'required|in:permanent,current',
            'country' => 'required|string',
            'address_1' => 'required|string',
            'address_2' => 'nullable|string',
            'post_code' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
        ]);
        $address->update($validated);
        return back()->with('success', 'Address updated.');
    }

    public function destroy($id)
    {
        $address = StudentAddress::findOrFail($id);
        $address->delete();
        return back()->with('success', 'Address deleted.');
    }
}