<?php

namespace App\Http\Controllers;

use App\Models\StudentAcademicInterest;
use Illuminate\Http\Request;

class StudentAcademicInterestController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'level_study' => 'required|string',
            'discipline' => 'required|string',
            'program_type' => 'required|string',
            'start_date' => 'required|date',
            'location' => 'nullable|string',
        ]);
        StudentAcademicInterest::create($validated);
        return back()->with('success', 'Academic interest added.');
    }

    public function update(Request $request, $id)
    {
        $interest = StudentAcademicInterest::findOrFail($id);
        $validated = $request->validate([
            'level_study' => 'required|string',
            'discipline' => 'required|string',
            'program_type' => 'required|string',
            'start_date' => 'required|date',
            'location' => 'nullable|string',
        ]);
        $interest->update($validated);
        return back()->with('success', 'Academic interest updated.');
    }

    public function destroy($id)
    {
        $interest = StudentAcademicInterest::findOrFail($id);
        $interest->delete();
        return back()->with('success', 'Academic interest deleted.');
    }
}