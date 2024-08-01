<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FunctionalMedicine;
use App\Models\Patient;
use Illuminate\Support\Facades\Validator;

class FunctionalMedicineController extends Controller
{
    public function index()
    {
        $FunctionalMedicine = FunctionalMedicine::paginate(10);
        return view("FunctionalMedicine.index", compact("FunctionalMedicine"));
    }

    public function create()
    {
        $patients = Patient::all();
        return view("FunctionalMedicine.create", compact("patients"));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "patient_id"=> "required|exists:patients,id",
            "details"=> "required|string",
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $functionalMedicine = FunctionalMedicine::create($request->all());

        flash('Functional Medicine created successfully')->success();
        return redirect()->route('functional-medicine.index');
    }

    public function show(FunctionalMedicine $functionalMedicine)
    {
        return view('FunctionalMedicine.show', compact('functionalMedicine'));
    }

    public function edit(FunctionalMedicine $functionalMedicine)
    {
        $patients = Patient::all(); // Assuming you have a Patient model
        return view('FunctionalMedicine.edit', compact('functionalMedicine', 'patients'));
    }

    public function update(Request $request, FunctionalMedicine $functionalMedicine)
    {
        $request->validate([
            'patient_id' => 'required',
            'details' => 'required',
        ]);

        $functionalMedicine->update([
            'patient_id' => $request->patient_id,
            'details' => $request->details,
        ]);

        return redirect()->route('functional-medicine.index')->with('success', 'Functional Medicine record updated successfully.');
    }

    public function destroy($id)
    {
        $functionalMedicine = FunctionalMedicine::findOrFail($id);

        // Perform additional checks if necessary before deletion

        $functionalMedicine->delete();

        return redirect()->route('functional-medicine.index')
                         ->with('success', 'Functional medicine record deleted successfully.');
    }
}
