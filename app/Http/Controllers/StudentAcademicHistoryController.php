<?php

namespace App\Http\Controllers;

use App\Models\StudentAcademicHistory;
use App\Models\StudentDestinationCountry;
use Illuminate\Http\Request;

class StudentAcademicHistoryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'country' => 'required|string',
            'institution_name' => 'required|string',
            'course_of_study' => 'required|string',
            'level_of_study' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'shift' => 'required|in:Full-time,Part-time',
            'grading_score' => 'required|string',
        ]);
        StudentAcademicHistory::create($validated);
        return back()->with('success', 'Academic history added.');
    }

    public function update(Request $request, $id)
    {
        $history = StudentAcademicHistory::findOrFail($id);
        $validated = $request->validate([
            'country' => 'required|string',
            'institution_name' => 'required|string',
            'course_of_study' => 'required|string',
            'level_of_study' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'shift' => 'required|in:Full-time,Part-time',
            'grading_score' => 'required|string',
        ]);
        $history->update($validated);
        return back()->with('success', 'Academic history updated.');
    }

    public function destroy($id)
    {
        $history = StudentAcademicHistory::findOrFail($id);
        $history->delete();
        return back()->with('success', 'Academic history deleted.');
    }

    public function storeDestinationCountry(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'countries' => 'required|array',
            'countries.*' => 'required|string',
        ]);

        foreach ($validated['countries'] as $country) {
            StudentDestinationCountry::create([
                'student_id' => $validated['student_id'],
                'country' => $country,
            ]);
        }

        return back()->with('success', 'Destination countries added.');
    }
}