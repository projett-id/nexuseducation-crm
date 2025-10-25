<?php

namespace App\Http\Controllers;

use App\Models\MasterDocument;
use Illuminate\Http\Request;

class MasterDocumentController extends Controller
{
    public function index()
    {
        $documents = MasterDocument::all();
        return view('master_document.index', compact('documents'));
    }

    public function create()
    {
        return view('master_document.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'document_name' => 'required|string',
            'document_type' => 'required|in:Mandatory,Additional',
            'description' => 'nullable|string',
            'allowed_file_type' => 'required|string',
            'max_file_size' => 'required|integer',
            'max_number_of_documents' => 'required|integer',
        ]);
        MasterDocument::create($validated);
        return redirect()->route('master-document.index')->with('success', 'Document master added.');
    }

    public function show($id)
    {
        $document = MasterDocument::findOrFail($id);
        return view('master_document.show', compact('document'));
    }

    public function edit($id)
    {
        $document = MasterDocument::findOrFail($id);
        return view('master_document.edit', compact('document'));
    }

    public function update(Request $request, $id)
    {
        $document = MasterDocument::findOrFail($id);
        $validated = $request->validate([
            'document_name' => 'required|string',
            'document_type' => 'required|in:Mandatory,Additional',
            'description' => 'nullable|string',
            'allowed_file_type' => 'required|string',
            'max_file_size' => 'required|integer',
            'max_number_of_documents' => 'required|integer',
        ]);
        $document->update($validated);
        return redirect()->route('master-document.index')->with('success', 'Document master updated.');
    }

    public function destroy($id)
    {
        $document = MasterDocument::findOrFail($id);
        $document->delete();
        return redirect()->route('master-document.index')->with('success', 'Document master deleted.');
    }
}