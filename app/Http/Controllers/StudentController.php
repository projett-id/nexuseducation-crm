<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Country;
use App\Models\MasterDocument;
use App\Models\StudentApplications;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Show student list
    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    public function listApplications(){
        $applications = StudentApplications::all();
        return view('applications', compact('applications'));
    }

    
    // Show create form
    public function create()
    {
        // For tab forms, you may need an empty $student object
        $student = new Student();
        $documentMasters = MasterDocument::whereIn('form_type',['General','Student'])->get();
        return view('student.create', compact('student', 'documentMasters'));
    }

    // Store new student
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string',
            'family_name' => 'required|string',
            'email' => 'required|email|unique:students,email',
            'phone_number' => 'required|string',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'nationality' => 'required|string',
            'country_of_birth' => 'required|string',
            'native_language' => 'nullable|string',
            'passport_name' => 'nullable|string',
            'passport_issue_location' => 'nullable|string',
            'passport_number' => 'nullable|string',
            'passport_issue_date' => 'nullable|date',
            'passport_expiry_date' => 'nullable|date',
            'religion' => 'nullable|string',
            'agent_name' => 'nullable|string',
            'agent_company' => 'nullable|string',
        ]);
        $student = Student::create($validated);
        return back()->with('success', 'Student created successfully.');
    }

    // Show student detail
    public function show($id)
    {
        $country = Country::where('status',1)->get();
        $student = Student::findOrFail($id);
        $documentMasters = MasterDocument::whereIn('form_type',['General','Student'])->get();
        return view('student.show', compact('student', 'documentMasters','country'));
    }

    // Show edit form
    public function edit($id)
    {
        $country = Country::where('status',1)->get();
        $student = Student::findOrFail($id);
        $documentMasters = MasterDocument::whereIn('form_type',['General','Student'])->get();
        $countries = config('const.countries');
        $listLevelOfStudy = config('const.levels_of_study');
        $listDisciplines = config('const.disciplines');
        return view('student.edit', compact('student', 'documentMasters','country','countries','listLevelOfStudy','listDisciplines'));
    }

    // Update student
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $validated = $request->validate([
            'first_name' => 'required|string',
            'family_name' => 'required|string',
            'email' => 'required|email|unique:students,email,' . $id,
            'phone_number' => 'required|string',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'nationality' => 'required|string',
            'country_of_birth' => 'required|string',
            'native_language' => 'nullable|string',
            'passport_name' => 'nullable|string',
            'passport_issue_location' => 'nullable|string',
            'passport_number' => 'nullable|string',
            'passport_issue_date' => 'nullable|date',
            'passport_expiry_date' => 'nullable|date',
            'religion' => 'nullable|string',
            'agent_name' => 'nullable|string',
            'agent_company' => 'nullable|string',
        ]);
        $student->update($validated);
        return back()->with('success', 'Student updated successfully.');
    }

    // Delete student
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Student deleted successfully.');
    }
}