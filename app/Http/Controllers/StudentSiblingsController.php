<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentSiblings;

class StudentSiblingsController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'name' => 'required|string',
            'gender' => 'required|string',
            'birthdate' => 'required|date',
        ]);
        StudentSiblings::create($validated);
        return back()->with('success', 'Siblings added.');
    }

    public function update(Request $request, $id)
    {
        $contact = StudentSiblings::findOrFail($id);
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'name' => 'required|string',
            'gender' => 'required|string',
            'birthdate' => 'required|date',
        ]);
        $contact->update($validated);
        return back()->with('success', 'Siblings updated.');
    }

    public function destroy($id)
    {
        $contact = StudentSiblings::findOrFail($id);
        $contact->delete();
        return back()->with('success', 'Siblings deleted.');
    }
}
