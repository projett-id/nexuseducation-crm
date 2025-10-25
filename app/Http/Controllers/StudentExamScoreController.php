<?php

namespace App\Http\Controllers;

use App\Models\StudentExamScore;
use Illuminate\Http\Request;

class StudentExamScoreController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'test_taken' => 'required|string',
            'writing_score' => 'required|string',
            'reading_score' => 'required|string',
            'listening_score' => 'required|string',
            'speaking_score' => 'required|string',
            'overall_score' => 'required|string',
            'date' => 'nullable|date',
            'test_reference_id' => 'nullable|string',
            'remarks' => 'nullable|string',
        ]);
        StudentExamScore::create($validated);
        return back()->with('success', 'Exam score added.');
    }

    public function update(Request $request, $id)
    {
        $score = StudentExamScore::findOrFail($id);
        $validated = $request->validate([
            'test_taken' => 'required|string',
            'writing_score' => 'required|string',
            'reading_score' => 'required|string',
            'listening_score' => 'required|string',
            'speaking_score' => 'required|string',
            'overall_score' => 'required|string',
            'date' => 'nullable|date',
            'test_reference_id' => 'nullable|string',
            'remarks' => 'nullable|string',
        ]);
        $score->update($validated);
        return back()->with('success', 'Exam score updated.');
    }

    public function destroy($id)
    {
        $score = StudentExamScore::findOrFail($id);
        $score->delete();
        return back()->with('success', 'Exam score deleted.');
    }
}