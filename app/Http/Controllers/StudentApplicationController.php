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
            'level_study_other'=>'nullable|string',
            'start_date' => 'required',
            'programme' => 'required|string'
        ]);
        $validated['start_date'] = \Carbon\Carbon::createFromFormat('Y-m', $request->start_date)->startOfMonth();
        $country = json_decode($request->country)[0]->value ?? null;
        $validated['country'] = $country;
        if ($validated['level_study'] === 'Other') {
            $validated['level_study'] = $validated['level_study_other'];
        }
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
            'start_date' => 'required',
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
