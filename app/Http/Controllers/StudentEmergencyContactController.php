<?php

namespace App\Http\Controllers;

use App\Models\StudentEmergencyContact;
use Illuminate\Http\Request;

class StudentEmergencyContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'name' => 'required|string',
            'relationship' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email',
        ]);
        StudentEmergencyContact::create($validated);
        return back()->with('success', 'Emergency contact added.');
    }

    public function update(Request $request, $id)
    {
        $contact = StudentEmergencyContact::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string',
            'relationship' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email',
        ]);
        $contact->update($validated);
        return back()->with('success', 'Emergency contact updated.');
    }

    public function destroy($id)
    {
        $contact = StudentEmergencyContact::findOrFail($id);
        $contact->delete();
        return back()->with('success', 'Emergency contact deleted.');
    }
}