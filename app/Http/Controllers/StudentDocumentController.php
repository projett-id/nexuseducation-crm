<?php

namespace App\Http\Controllers;

use App\Models\StudentDocument;
use App\Models\MasterDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentDocumentController extends Controller
{
    public function store(Request $request)
    {
        // Ambil master document
        $master = MasterDocument::findOrFail($request->document_master_id);

        // Konversi max_file_size ke KB jika disimpan dalam MB
        $maxSizeKB = $master->max_file_size * 1024; // Jika max_file_size dalam MB

        // Buat rule ekstensi
        $extensions = array_map('strtolower', explode(',', str_replace(' ', '', $master->allowed_file_type)));
        $mimesRule = 'mimes:' . implode(',', $extensions);

        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'document_master_id' => 'required|exists:master_documents,id',
            'file_path' => "required|file|{$mimesRule}|max:{$maxSizeKB}",
        ]);

        $path = $request->file('file_path')->store('documents', 'public');
        $validated['file_path'] = $path;
        StudentDocument::create($validated);
        return back()->with('success', 'Document added.');
    }

    public function update(Request $request, $id)
    {
        $document = StudentDocument::findOrFail($id);
        $master = MasterDocument::findOrFail($request->document_master_id);

        $maxSizeKB = $master->max_file_size * 1024;
        $extensions = array_map('strtolower', explode(',', str_replace(' ', '', $master->allowed_file_type)));
        $mimesRule = 'mimes:' . implode(',', $extensions);

        $validated = $request->validate([
            'document_master_id' => 'required|exists:master_documents,id',
            'file_path' => "nullable|file|{$mimesRule}|max:{$maxSizeKB}",
        ]);

        if ($request->hasFile('file_path')) {
            if ($document->file_path) {
                Storage::disk('public')->delete($document->file_path);
            }
            $validated['file_path'] = $request->file('file_path')->store('documents', 'public');
        }
        $document->update($validated);
        return back()->with('success', 'Document updated.');
    }

    public function destroy($id)
    {
        $document = StudentDocument::findOrFail($id);
        if ($document->file_path) {
            Storage::disk('public')->delete($document->file_path);
        }
        $document->delete();
        return back()->with('success', 'Document deleted.');
    }
}