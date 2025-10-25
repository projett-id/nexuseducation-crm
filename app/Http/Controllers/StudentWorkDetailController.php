<?php

namespace App\Http\Controllers;

use App\Models\StudentWorkDetail;
use Illuminate\Http\Request;

class StudentWorkDetailController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'job_title' => 'required|string',
            'company' => 'required|string',
            'address' => 'required|string',
            'phone_number' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'currently_working' => 'nullable|boolean',
        ]);
        $validated['currently_working'] = $request->has('currently_working');
        StudentWorkDetail::create($validated);
        return back()->with('success', 'Work detail added.');
    }

    public function update(Request $request, $id)
    {
        $work = StudentWorkDetail::findOrFail($id);
        $validated = $request->validate([
            'job_title' => 'required|string',
            'company' => 'required|string',
            'address' => 'required|string',
            'phone_number' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'currently_working' => 'nullable|boolean',
        ]);
        $validated['currently_working'] = $request->has('currently_working');
        $work->update($validated);
        return back()->with('success', 'Work detail updated.');
    }

    public function destroy($id)
    {
        $work = StudentWorkDetail::findOrFail($id);
        $work->delete();
        return back()->with('success', 'Work detail deleted.');
    }
}