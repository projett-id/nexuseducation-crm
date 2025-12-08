<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VisaForm;
use App\Models\MasterDocument;
use App\Models\VisaFormDocument;
use Illuminate\Support\Facades\Storage;
class VisaFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all visa forms
        $data = VisaForm::latest()->paginate(20);

        return view('visa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource (Wizard Form).
     */
    public function create()
    {
        return view('visa.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Basic validation
        $validated = $request->validate([
            'name' => 'required',
        ]);

        // Create new record
        $visa = VisaForm::create($request->all());

        return redirect()->route('visa.edit', $visa->id)
            ->with('success', 'Visa application data has been saved successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(VisaForm $visa)
    {
        return view('visa.show', compact('visa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VisaForm $visa)
    {
        $documentMasters = MasterDocument::whereIn('form_type', ['General','Visa'])->get();
        return view('visa.edit', compact('visa','documentMasters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VisaForm $visa)
    {
        // Validation
        $validated = $request->validate([
            'name' => 'required',
        ]);

        // Update record
        $visa->update($request->all());

        return redirect()->route('visa.show', $visa->id)
            ->with('success', 'Visa application data has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VisaForm $visa)
    {
        $visa->delete();

        return redirect()->route('visa.index')
            ->with('success', 'Visa application deleted successfully!');
    }

    public function storeDocuments(Request $request)
    {
        // Ambil master document
        $master = MasterDocument::findOrFail($request->document_master_id);

        // Konversi max_file_size ke KB jika disimpan dalam MB
        $maxSizeKB = $master->max_file_size * 1024; // Jika max_file_size dalam MB

        // Buat rule ekstensi
        $extensions = array_map('strtolower', explode(',', str_replace(' ', '', $master->allowed_file_type)));
        $mimesRule = 'mimes:' . implode(',', $extensions);

        $validated = $request->validate([
            'visa_id' => 'required|exists:visa_forms,id',
            'document_master_id' => 'required|exists:master_documents,id',
            'file_path' => "required|file|{$mimesRule}|max:{$maxSizeKB}",
        ]);

        $path = $request->file('file_path')->store('documents/visa', 'public');
        $validated['file_path'] = $path;
        VisaFormDocument::create($validated);
        return back()->with('success', 'Document added.');
    }

    public function updateDocuments(Request $request, $id)
    {
        $document = VisaFormDocument::findOrFail($id);
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
            $validated['file_path'] = $request->file('file_path')->store('documents/visa', 'public');
        }
        $document->update($validated);
        return back()->with('success', 'Document updated.');
    }

    public function destroyDocuments($id)
    {
        $document = VisaFormDocument::findOrFail($id);
        if ($document->file_path) {
            Storage::disk('public')->delete($document->file_path);
        }
        $document->delete();
        return back()->with('success', 'Document deleted.');
    }
}
