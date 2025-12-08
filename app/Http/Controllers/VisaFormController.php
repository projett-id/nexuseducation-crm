<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VisaForm;
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

        return redirect()->route('visa.show', $visa->id)
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
        return view('visa.edit', compact('visa'));
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
}
