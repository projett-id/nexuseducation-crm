<?php

namespace App\Http\Controllers;

use App\Models\StudentReferee;
use Illuminate\Http\Request;

class StudentRefereeController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'name' => 'required|string',
            'position' => 'required|string',
            'title' => 'nullable|string',
            'work_email' => 'required|email',
            'duration' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'relationship' => 'required|string',
            'institution_name' => 'required|string',
            'institution_address' => 'required|string',
        ]);
        StudentReferee::create($validated);
        return back()->with('success', 'Referee added.');
    }

    public function update(Request $request, $id)
    {
        $referee = StudentReferee::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string',
            'position' => 'required|string',
            'title' => 'nullable|string',
            'work_email' => 'required|email',
            'duration' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'relationship' => 'required|string',
            'institution_name' => 'required|string',
            'institution_address' => 'required|string',
        ]);
        $referee->update($validated);
        return back()->with('success', 'Referee updated.');
    }

    public function destroy($id)
    {
        $referee = StudentReferee::findOrFail($id);
        $referee->delete();
        return back()->with('success', 'Referee deleted.');
    }
}