<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentApplicationHistory;
use App\Models\StudentApplications;
class StudentApplicationHistoryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'application_id' => 'required|exists:student_applications,id',
            'status' => 'required',
            'note' => 'required',
            'attachment' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);
        
        if ($request->hasFile('attachment')) {
            $filePath = $request->file('attachment')->store('documents/applications/'.$request->application_id, 'public');
            $validated['attachment'] = $filePath;
        }
        StudentApplicationHistory::create($validated);
        StudentApplications::where('id',$validated['application_id'])->update(['last_status'=>$request->status]);
        return back()->with('success', 'Academic history added.');
    }

    public function update(Request $request, $id)
    {
        $history = StudentApplicationHistory::findOrFail($id);
        $validated = $request->validate([
            'application_id' => 'required|exists:student_applications,id',
            'status' => 'required',
            'note' => 'required',
            'attachment' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);
        
        if ($request->hasFile('attachment')) {
            $filePath = $request->file('attachment')->store('documents/applications/'.$request->application_id, 'public');
            $validated['attachment'] = $filePath;
        }

        $history->update($validated);
        return back()->with('success', 'Academic history updated.');
    }

    public function destroy($id)
    {
        $history = StudentApplicationHistory::findOrFail($id);
        $history->delete();
        return back()->with('success', 'Academic history deleted.');
    }
}
