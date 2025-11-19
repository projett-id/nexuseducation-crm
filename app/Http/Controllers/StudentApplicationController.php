<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentApplications;

class StudentApplicationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'country' => 'required|string',
            'institution_name' => 'required|string',
            'level_of_study' => 'required|string',
            'programme' => 'required|string'
        ]);
        $country = json_decode($request->country)[0]->value ?? null;
        $validated['country'] = $country;
        StudentApplications::create($validated);
        return back()->with('success', 'Applications was created.');
    }

    public function update(Request $request, $id)
    {
        $history = StudentApplications::findOrFail($id);
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'country' => 'required|string',
            'institution_name' => 'required|string',
            'level_of_study' => 'required|string',
            'programme' => 'required|string'
        ]);
        $history->update($validated);
        return back()->with('success', 'Applications was updated.');
    }

    public function destroy($id)
    {
        $history = StudentApplications::findOrFail($id);
        $history->delete();
        return back()->with('success', 'Applications was deleted.');
    }
}
